<?php

namespace App\Http\Controllers;

use App\Models\Usaha;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class UsahaController extends Controller
{
    public function usaha()
    {
        return view('surat.usaha');
    }

    public function usahaStore(Request $request)
    {

        // Check if user is authenticated
        $userId = auth()->id();
        if (!$userId) {
            return redirect('/login')->with('error', 'Please login to submit the form.');
        }

        Log::info('User ID: ' . auth()->id() . ' is trying to store data.');

        $request->validate([
            'nama' => 'required|string|max:255',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'nik' => 'required|string|max:16',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'status_pernikahan' => 'required|in:Belum Menikah,Menikah,Duda,Janda',
            'alamat' => 'required|string',
            'usaha' => 'required|string|max:255',
            'lokasi' => 'required|string|max:255',
            'lama_usaha' => 'required|string|max:255',
            'berkas_persyaratan' => 'required|file|max:10240',
        ]);

        Log::info('Validation passed for user ID: ' . auth()->id());

        $berkasPengajuan = $request->file('berkas_persyaratan');
        $namaFile = time() . '_' . $berkasPengajuan->getClientOriginalName();
        $path = $berkasPengajuan->storeAs('berkas_persyaratan', $namaFile, 'public');

        Log::info('File uploaded by user ID: ' . auth()->id() . ' to path: ' . $path);

        $usaha = new Usaha();
        $usaha->user_id = auth()->id();
        $usaha->nama = $request->nama;
        $usaha->tempat_lahir = $request->tempat_lahir;
        $usaha->tanggal_lahir = $request->tanggal_lahir;
        $usaha->nik = $request->nik;
        $usaha->jenis_kelamin = $request->jenis_kelamin;
        $usaha->status_pernikahan = $request->status_pernikahan;
        $usaha->alamat = $request->alamat;
        $usaha->usaha = $request->usaha;
        $usaha->lokasi = $request->lokasi;
        $usaha->lama_usaha = $request->lama_usaha;
        $usaha->berkas_persyaratan = $path;
        $usaha->status = 'Data Sedang Diperiksa';
        $usaha->keterangan = 'Menunggu Konfirmasi';
        $usaha->nomor_surat = 'belum ada';
        $usaha->save();

        return redirect()->route('usaha.index')->with('success', 'Data usaha berhasil disimpan.');
    }
    public function index()
    {
        $user = Auth::user();
        if ($user->usertype === 'user') {
            $data = Usaha::where('user_id', $user->id)->get();
        } else {
            $data = Usaha::all();
        }

        return view('surat.listUsaha', compact('data'));
    }
}