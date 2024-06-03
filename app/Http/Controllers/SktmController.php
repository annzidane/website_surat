<?php

namespace App\Http\Controllers;

use App\Models\Sktm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Barryvdh\DomPDF\Facade\Pdf;

class SktmController extends Controller
{
    public function sktm()
    {
        return view('surat.sktm');
    }
    public function sktmStore(Request $request)
    {
        // Check if user is authenticated
        $userId = auth()->id();
        if (!$userId) {
            return redirect('/login')->with('error', 'Please login to submit the form.');
        }

        Log::info('User ID: ' . $userId . ' is trying to store SKTM data.');

        // Validate the request data
        $request->validate([
            // Data Pemohon
            'nama' => 'required|string|max:255',
            'nik' => 'required|string|size:16',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'pekerjaan' => 'required|string|max:255',
            'alamat' => 'required|string',
            // Data Orang Tua
            'nama_orang_tua' => 'required|string|max:255',
            'nik_orang_tua' => 'required|string|size:16',
            'pekerjaan_orang_tua' => 'required|string|max:255',
            'umur_orang_tua' => 'required|integer|min:0',
            'alamat_orang_tua' => 'required|string',
            // Keperluan
            'keperluan' => 'required|string|max:255',
            // Berkas
            'berkas_kk' => 'required|file|max:10240', // KK
            'berkas_ktp' => 'required|file|max:10240', // KTP
            'berkas_pengantar_rt' => 'required|file|max:10240', // Surat Pengantar RT
        ]);

        Log::info('Validation passed for user ID: ' . $userId);

        // Handle the file uploads
        $berkasKK = $request->file('berkas_kk');
        $namaFileKK = Str::uuid() . '.' . $berkasKK->getClientOriginalExtension();
        $pathKK = $berkasKK->storeAs('berkas_kk', $namaFileKK, 'public');

        $berkasKTP = $request->file('berkas_ktp');
        $namaFileKTP = Str::uuid() . '.' . $berkasKTP->getClientOriginalExtension();
        $pathKTP = $berkasKTP->storeAs('berkas_ktp', $namaFileKTP, 'public');

        $berkasPengantarRT = $request->file('berkas_pengantar_rt');
        $namaFilePengantarRT = Str::uuid() . '.' . $berkasPengantarRT->getClientOriginalExtension();
        $pathPengantarRT = $berkasPengantarRT->storeAs('berkas_pengantar_rt', $namaFilePengantarRT, 'public');

        Log::info('Files uploaded by user ID: ' . $userId);

        // Store the data into the database
        $sktm = new Sktm();
        $sktm->user_id = $userId;
        // Data Pemohon
        $sktm->nama = $request->nama;
        $sktm->nik = $request->nik;
        $sktm->tempat_lahir = $request->tempat_lahir;
        $sktm->tanggal_lahir = $request->tanggal_lahir;
        $sktm->jenis_kelamin = $request->jenis_kelamin;
        $sktm->pekerjaan = $request->pekerjaan;
        $sktm->alamat = $request->alamat;
        // Data Orang Tua
        $sktm->nama_orang_tua = $request->nama_orang_tua;
        $sktm->nik_orang_tua = $request->nik_orang_tua;
        $sktm->pekerjaan_orang_tua = $request->pekerjaan_orang_tua;
        $sktm->umur_orang_tua = $request->umur_orang_tua;
        $sktm->alamat_orang_tua = $request->alamat_orang_tua;
        // Keperluan
        $sktm->keperluan = $request->keperluan;
        // Berkas
        $sktm->berkas_kk = $pathKK;
        $sktm->berkas_ktp = $pathKTP;
        $sktm->berkas_pengantar_rt = $pathPengantarRT;
        // Status dan keterangan default
        $sktm->status = 'Data Sedang Diperiksa';
        $sktm->keterangan = 'Menunggu Konfirmasi';
        $sktm->nomor_surat = 'belum ada';
        // Simpan data
        $sktm->save();

        // Redirect dengan pesan sukses
        return redirect()->route('sktm.index')->with('success', 'Data SKTM berhasil disimpan.');
    }

    public function index()
    {
        $user = Auth::user();
        if ($user->usertype === 'user') {
            $data = Sktm::where('user_id', $user->id)->get();
        } else {
            $data = Sktm::all();
        }
        return view('surat.listSktm', compact('data'));
    }
    public function cetak($id)
    {
        $data = Sktm::findOrFail($id);
        $pdf = PDF::loadView('surat.sktm_pdf', compact('data'));
        return $pdf->download('surat_keterangan_tidak_mampu.pdf');
    }
}