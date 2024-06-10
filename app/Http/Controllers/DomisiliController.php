<?php

namespace App\Http\Controllers;

use App\Models\Domisili;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Barryvdh\DomPDF\Facade\Pdf;

class DomisiliController extends Controller
{
    public function domisili()
    {
        return view('surat.domisili');
    }
    public function domisiliStore(Request $request)
    {
        // Check if user is authenticated
        $userId = auth()->id();
        if (!$userId) {
            return redirect('/login')->with('error', 'Please login to submit the form.');
        }
    
        Log::info('User ID: ' . auth()->id() . ' is trying to store data.');
    
        // Validasi data yang diterima dari formulir
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'nik' => 'required|string|size:16', // Nik harus memiliki 16 karakter
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'kewarganegaraan' => 'required|in:WNI,WNA',
            'status_pernikahan' => 'required|in:Belum Menikah,Menikah,Cerai Mati,Cerai Hidup',
            'alamat_ktp' => 'required|string',
            'berkas_ktp' => 'required|file|max:10240', // Maksimum 10 MB
            'berkas_pengantar_RT' => 'required|file|max:10240', // Maksimum 10 MB
        ]);
    
        Log::info('Validation passed for user ID: ' . auth()->id());
    
        // Handle file uploads with unique names
        $berkasKTP = $request->file('berkas_ktp');
        $namaFileKTP = Str::uuid() . '.' . $berkasKTP->getClientOriginalExtension();
        $pathKTP = $berkasKTP->storeAs('berkas_ktp', $namaFileKTP, 'public');
    
        $berkasPengantarRT = $request->file('berkas_pengantar_RT');
        $namaFilePengantarRT = Str::uuid() . '.' . $berkasPengantarRT->getClientOriginalExtension();
        $pathPengantarRT = $berkasPengantarRT->storeAs('berkas_pengantar_RT', $namaFilePengantarRT, 'public');
    
        Log::info('Files uploaded by user ID: ' . auth()->id() . ' to paths: KTP - ' . $pathKTP . ', Pengantar RT - ' . $pathPengantarRT);
    
        // Proses penyimpanan data ke dalam database
        $domisili = new Domisili();
        $domisili->user_id = auth()->id();
        $domisili->nama = $request->nama;
        $domisili->tempat_lahir = $request->tempat_lahir;
        $domisili->tanggal_lahir = $request->tanggal_lahir;
        $domisili->nik = $request->nik;
        $domisili->jenis_kelamin = $request->jenis_kelamin;
        $domisili->kewarganegaraan = $request->kewarganegaraan;
        $domisili->status_pernikahan = $request->status_pernikahan;
        $domisili->alamat_ktp = $request->alamat_ktp;
        $domisili->berkas_ktp = $pathKTP;
        $domisili->berkas_pengantar_RT = $pathPengantarRT;
        $domisili->status = 'Data Sedang Diperiksa';
        $domisili->keterangan = 'Menunggu Konfirmasi';
        $domisili->nomor_surat = 'belum ada';
        $domisili->save();
    
        Log::info('Data saved for user ID: ' . auth()->id());
    
        // Beri respon berhasil dan redirect ke halaman yang sesuai
        return redirect()->route('domisili.index')->with('success', 'Data domisili berhasil disimpan.');
    }

    public function index()
    {
        $user = Auth::user();
        if ($user->usertype === 'user') {
            $data = Domisili::where('user_id', $user->id)->get();
        } else {
            $data = Domisili::all();
        }
        return view('surat.listDomisili', compact('data'));
    }

    public function cetak($id)
    {
        set_time_limit(300); // Extend execution time

        $data = Domisili::findOrFail($id);
        $pdf = PDF::loadView('surat.domisili_pdf', compact('data'));
        return $pdf->download('surat_keterangan_domisili.pdf');
    }
}
