<?php

namespace App\Http\Controllers;

use App\Models\Pindah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class PindahController extends Controller
{
    public function pindah()
    {
        return view('surat.pindah');
    }
    public function pindahStore(Request $request)
{
    // Check if user is authenticated
    $userId = auth()->id();
    if (!$userId) {
        return redirect('/login')->with('error', 'Please login to submit the form.');
    }

    Log::info('User ID: ' . $userId . ' is trying to store pindah data.');

    // Validate the request data
    $validatedData = $request->validate([
        // Data Daerah Asal
        'nomor_kk' => 'required|string|max:255',
        'nama_kepala_keluarga' => 'required|string|max:255',
        'alamat' => 'required|string',
        'kode_pos' => 'nullable|string|max:10',
        'telepon' => 'nullable|string|max:15',
        'nik_pemohon' => 'required|string|max:255',
        'nama_lengkap_pemohon' => 'required|string|max:255',
        // Data Daerah Tujuan
        'status_kk' => 'required|in:Numpang KK,Membuat KK Baru,Nomor KK Tetap',
        'nomor_kk_tujuan' => 'required|string|max:255',
        'nik_kepala_keluarga_tujuan' => 'required|string|max:255',
        'nama_kepala_keluarga_tujuan' => 'required|string|max:255',
        'tanggal_kedatangan' => 'required|date',
        'alamat_tujuan' => 'required|string',
        // Anggota Keluarga yang Datang
        'nik_keluarga_datang' => 'required|string|max:255',
        'nama_keluarga_datang' => 'required|string|max:255',
        'masa_berlaku_ktp' => 'nullable|date',
        'shdk' => 'required|in:Kepala Keluarga,Suami,Istri,Anak,Menantu,Cucu,Orang Tua,Mertua,Famili Lain,Pembantu,Lainnya',
        // Kolom untuk anggota keluarga kedua dan seterusnya (nullable)
        'nik_keluarga_datang2' => 'nullable|string|max:255',
        'nama_keluarga_datang2' => 'nullable|string|max:255',
        'masa_berlaku_ktp2' => 'nullable|date',
        'shdk2' => 'nullable|in:Kepala Keluarga,Suami,Istri,Anak,Menantu,Cucu,Orang Tua,Mertua,Famili Lain,Pembantu,Lainnya',
        'nik_keluarga_datang3' => 'nullable|string|max:255',
        'nama_keluarga_datang3' => 'nullable|string|max:255',
        'masa_berlaku_ktp3' => 'nullable|date',
        'shdk3' => 'nullable|in:Kepala Keluarga,Suami,Istri,Anak,Menantu,Cucu,Orang Tua,Mertua,Famili Lain,Pembantu,Lainnya',
        'nik_keluarga_datang4' => 'nullable|string|max:255',
        'nama_keluarga_datang4' => 'nullable|string|max:255',
        'masa_berlaku_ktp4' => 'nullable|date',
        'shdk4' => 'nullable|in:Kepala Keluarga,Suami,Istri,Anak,Menantu,Cucu,Orang Tua,Mertua,Famili Lain,Pembantu,Lainnya',
        'nik_keluarga_datang5' => 'nullable|string|max:255',
        'nama_keluarga_datang5' => 'nullable|string|max:255',
        'masa_berlaku_ktp5' => 'nullable|date',
        'shdk5' => 'nullable|in:Kepala Keluarga,Suami,Istri,Anak,Menantu,Cucu,Orang Tua,Mertua,Famili Lain,Pembantu,Lainnya',
        'nik_keluarga_datang6' => 'nullable|string|max:255',
        'nama_keluarga_datang6' => 'nullable|string|max:255',
        'masa_berlaku_ktp6' => 'nullable|date',
        'shdk6' => 'nullable|in:Kepala Keluarga,Suami,Istri,Anak,Menantu,Cucu,Orang Tua,Mertua,Famili Lain,Pembantu,Lainnya',
        // Berkas persyaratan
        'berkas_kk' => 'required|file|max:10240',
        'berkas_pbb' => 'required|file|max:10240',
        'berkas_ktp' => 'required|file|max:10240',
        'berkas_ktp2' => 'nullable|file|max:10240',
        'berkas_ktp3' => 'nullable|file|max:10240',
        'berkas_ktp4' => 'nullable|file|max:10240',
        'berkas_ktp5' => 'nullable|file|max:10240',
        'berkas_ktp6' => 'nullable|file|max:10240',
    ]);

        Log::info('Validation passed for user ID: ' . $userId);

        // Function to handle file upload and securing file names
        function secureFileUpload($file) {
            if ($file) {
                $namaFile = Str::uuid() . '.' . $file->getClientOriginalExtension();
                $path = $file->storeAs('berkas_persyaratan', $namaFile, 'public');
                return $path;
            }
            return null;
        }

        // Handle the file uploads
        $berkasKkPath = secureFileUpload($request->file('berkas_kk'));
        $berkasPbbPath = secureFileUpload($request->file('berkas_pbb'));
        $berkasKtpPath = secureFileUpload($request->file('berkas_ktp'));
        $berkasKtp2Path = secureFileUpload($request->file('berkas_ktp2'));
        $berkasKtp3Path = secureFileUpload($request->file('berkas_ktp3'));
        $berkasKtp4Path = secureFileUpload($request->file('berkas_ktp4'));
        $berkasKtp5Path = secureFileUpload($request->file('berkas_ktp5'));
        $berkasKtp6Path = secureFileUpload($request->file('berkas_ktp6'));

        Log::info('Files uploaded by user ID: ' . $userId);

        // Store the data into the database
        $pindah = new Pindah();
        $pindah->user_id = $userId;
        // Data Daerah Asal
        $pindah->nomor_kk = $request->nomor_kk;
        $pindah->nama_kepala_keluarga = $request->nama_kepala_keluarga;
        $pindah->alamat = $request->alamat;
        $pindah->kode_pos = $request->kode_pos;
        $pindah->telepon = $request->telepon;
        $pindah->nik_pemohon = $request->nik_pemohon;
        $pindah->nama_lengkap_pemohon = $request->nama_lengkap_pemohon;
        // Data Daerah Tujuan
        $pindah->status_kk = $request->status_kk;
        $pindah->nomor_kk_tujuan = $request->nomor_kk_tujuan;
        $pindah->nik_kepala_keluarga_tujuan = $request->nik_kepala_keluarga_tujuan;
        $pindah->nama_kepala_keluarga_tujuan = $request->nama_kepala_keluarga_tujuan;
        $pindah->tanggal_kedatangan = $request->tanggal_kedatangan;
        $pindah->alamat_tujuan = $request->alamat_tujuan;
        // Anggota Keluarga yang Datang
        $pindah->nik_keluarga_datang = $request->nik_keluarga_datang;
        $pindah->nama_keluarga_datang = $request->nama_keluarga_datang;
        $pindah->masa_berlaku_ktp = $request->masa_berlaku_ktp;
        $pindah->shdk = $request->shdk;
        // Kolom untuk anggota keluarga kedua dan seterusnya (nullable)
        $pindah->nik_keluarga_datang2 = $request->nik_keluarga_datang2;
        $pindah->nama_keluarga_datang2 = $request->nama_keluarga_datang2;
        $pindah->masa_berlaku_ktp2 = $request->masa_berlaku_ktp2;
        $pindah->shdk2 = $request->shdk2;
        $pindah->nik_keluarga_datang3 = $request->nik_keluarga_datang3;
        $pindah->nama_keluarga_datang3 = $request->nama_keluarga_datang3;
        $pindah->masa_berlaku_ktp3 = $request->masa_berlaku_ktp3;
        $pindah->shdk3 = $request->shdk3;
        $pindah->nik_keluarga_datang4 = $request->nik_keluarga_datang4;
        $pindah->nama_keluarga_datang4 = $request->nama_keluarga_datang4;
        $pindah->masa_berlaku_ktp4 = $request->masa_berlaku_ktp4;
        $pindah->shdk4 = $request->shdk4;
        $pindah->nik_keluarga_datang5 = $request->nik_keluarga_datang5;
        $pindah->nama_keluarga_datang5 = $request->nama_keluarga_datang5;
        $pindah->masa_berlaku_ktp5 = $request->masa_berlaku_ktp5;
        $pindah->shdk5 = $request->shdk5;
        $pindah->nik_keluarga_datang6 = $request->nik_keluarga_datang6;
        $pindah->nama_keluarga_datang6 = $request->nama_keluarga_datang6;
        $pindah->masa_berlaku_ktp6 = $request->masa_berlaku_ktp6;
        $pindah->shdk6 = $request->shdk6;
        // Berkas persyaratan
        $pindah->berkas_kk = $berkasKkPath;
        $pindah->berkas_pbb = $berkasPbbPath;
        $pindah->berkas_ktp = $berkasKtpPath;
        $pindah->berkas_ktp2 = $berkasKtp2Path;
        $pindah->berkas_ktp3 = $berkasKtp3Path;
        $pindah->berkas_ktp4 = $berkasKtp4Path;
        $pindah->berkas_ktp5 = $berkasKtp5Path;
        $pindah->berkas_ktp6 = $berkasKtp6Path;
        // Status dan keterangan default
        $pindah->status = 'Data Sedang Diperiksa';
        $pindah->keterangan = 'Menunggu Konfirmasi';
        $pindah->nomor_surat = 'belum ada';
        // Simpan data
        $pindah->save();

        Log::info('Data saved for user ID: ' . $userId);

        // Redirect dengan pesan sukses
        return redirect()->route('pindah.index')->with('success', 'Data pindah berhasil disimpan.');
    }

    public function index()
    {
        $user = Auth::user();
        if ($user->usertype === 'user') {
            $data = Pindah::where('user_id', $user->id)->get();
        } else {
            $data = Pindah::all();
        }

        return view('surat.listPindah', compact('data'));
    }
    

}