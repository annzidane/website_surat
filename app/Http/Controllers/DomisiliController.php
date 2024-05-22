<?php

namespace App\Http\Controllers;

use App\Models\Domisili;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

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
            'nik' => 'required|string',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'kewarganegaraan' => 'required|in:WNI,WNA',
            'status_pernikahan' => 'required|in:Belum Menikah,Menikah,Cerai Mati,Cerai Hidup',
            'alamat_ktp' => 'required|string',
            'berkas_persyaratan' => 'required|file',
        ]);

        Log::info('Validation passed for user ID: ' . auth()->id());

        $berkasPengajuan = $request->file('berkas_persyaratan');
        $namaFile = time() . '_' . $berkasPengajuan->getClientOriginalName();
        $path = $berkasPengajuan->storeAs('berkas_persyaratan', $namaFile, 'public');

        Log::info('File uploaded by user ID: ' . auth()->id() . ' to path: ' . $path);

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
        $domisili->berkas_persyaratan = $request->file('berkas_persyaratan')->store('public/berkas_persyaratan'); // Simpan berkas persyaratan ke dalam direktori storage
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

}