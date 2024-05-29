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
        $userId = auth()->id();
        if (!$userId) {
            return redirect('/login')->with('error', 'Please login to submit the form.');
        }

        Log::info('User ID: ' . auth()->id() . ' is trying to store data.');
        
        // Validasi data yang diterima dari formulir
        $validatedData = $request->validate([
            'nama' => 'required|string',
            'tempat_lahir' => 'required|string',
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

        // Proses penyimpanan file berkas_ktp ke dalam direktori storage dengan nama yang unik
        $berkasKTP = $request->file('berkas_ktp');
        $pathKTP = $berkasKTP->storeAs('berkas_ktp', Str::random(40) . '.' . $berkasKTP->getClientOriginalExtension());

        // Proses penyimpanan file berkas_pengantar_RT ke dalam direktori storage dengan nama yang unik
        $berkasPengantarRT = $request->file('berkas_pengantar_RT');
        $pathPengantarRT = $berkasPengantarRT->storeAs('berkas_pengantar_RT', Str::random(40) . '.' . $berkasPengantarRT->getClientOriginalExtension());

        Log::info('Files uploaded by user ID: ' . auth()->id());

        // Proses penyimpanan data ke dalam database
        $domisili = new Domisili();
        $domisili->user_id = auth()->user()->id; // Anda bisa sesuaikan dengan cara Anda mendapatkan user ID
        $domisili->nama = $validatedData['nama'];
        $domisili->tempat_lahir = $validatedData['tempat_lahir'];
        $domisili->tanggal_lahir = $validatedData['tanggal_lahir'];
        $domisili->nik = $validatedData['nik'];
        $domisili->jenis_kelamin = $validatedData['jenis_kelamin'];
        $domisili->kewarganegaraan = $validatedData['kewarganegaraan'];
        $domisili->status_pernikahan = $validatedData['status_pernikahan'];
        $domisili->alamat_ktp = $validatedData['alamat_ktp'];
        $domisili->berkas_ktp = $pathKTP;
        $domisili->berkas_pengantar_RT = $pathPengantarRT;
        $domisili->keterangan_domisili = 'belum ada';
        $domisili->status = 'Data Sedang Diperiksa';
        $domisili->keterangan = 'Menunggu Konfirmasi';
        $domisili->nomor_surat = 'belum ada';
        $domisili->save();

        // Beri respon berhasil dan redirect ke halaman yang sesuai
        return redirect()->route('domisili.index')
            ->with('success', 'Data domisili berhasil disimpan.');
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
        return $pdf->download('Surat_Keterangan_Domisili.pdf');
    }
}
