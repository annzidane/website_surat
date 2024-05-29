<?php

namespace App\Http\Controllers;

use App\Models\Kelahiran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class KelahiranController extends Controller
{
    public function kelahiran()
    {
        return view('surat.kelahiran');
    }

    public function kelahiranStore(Request $request)
    {
        // Check if user is authenticated
        $userId = auth()->id();
        if (!$userId) {
            return redirect('/login')->with('error', 'Please login to submit the form.');
        }

        Log::info('User ID: ' . $userId . ' is trying to store birth data.');

        // Validate the request data
        $request->validate([
            // Anak
            'nama_anak' => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'tempat_dilahirkan' => 'required|in:RS,Puskesmas,Polindes,Rumah,lainnya',
            'tempat_kelahiran' => 'required|string|max:255',
            'hari' => 'required|string|max:10',
            'tanggal_lahir' => 'required|date',
            'jam' => 'required|date_format:H:i',
            'jenis_kelahiran' => 'required|in:Tunggal,Kembar 2,Kembar 3,Kembar 4,lainnya',
            'kelahiran' => 'required|string|max:10',
            'penolong_kelahiran' => 'required|in:Dokter,Bidan/Perawat,Dukun,lainnya',
            'berat_bayi' => 'required|numeric|between:0,99999999.99',
            'panjang_bayi' => 'required|numeric|between:0,99999999.99',
            'surat_keterangan_lahir' => 'nullable|file|max:10240',
            // Ibu
            'nik_ibu' => 'required|string|max:255',
            'nama_ibu' => 'required|string|max:255',
            'tanggal_lahir_ibu' => 'required|date',
            'umur_ibu' => 'required|integer|min:0',
            'pekerjaan_ibu' => 'required|string|max:255',
            'alamat_ibu' => 'required|string',
            'kewarganegaraan_ibu' => 'required|in:WNI,WNA',
            'kebangsaan_ibu' => 'required|string|max:255',
            'tanggal_pernikahan' => 'nullable|date',
            'berkas_ktp_ibu' => 'required|file|max:10240',
            // Ayah
            'nik_ayah' => 'required|string|max:255',
            'nama_ayah' => 'required|string|max:255',
            'tanggal_lahir_ayah' => 'required|date',
            'umur_ayah' => 'required|integer|min:0',
            'pekerjaan_ayah' => 'required|string|max:255',
            'alamat_ayah' => 'required|string',
            'kewarganegaraan_ayah' => 'required|in:WNI,WNA',
            'kebangsaan_ayah' => 'required|string|max:255',
            'berkas_ktp_ayah' => 'required|file|max:10240',
            // Pelapor
            'nik_pelapor' => 'nullable|string|max:255',
            'nama_pelapor' => 'nullable|string|max:255',
            'umur_pelapor' => 'nullable|integer|min:0',
            'jenis_kelamin_pelapor' => 'nullable|string|in:Laki-laki,Perempuan',
            'pekerjaan_pelapor' => 'nullable|string|max:255',
            'alamat_pelapor' => 'nullable|string',
            // Saksi 1
            'nik_saksi1' => 'nullable|string|max:255',
            'nama_saksi1' => 'nullable|string|max:255',
            'umur_saksi1' => 'nullable|integer|min:0',
            'pekerjaan_saksi1' => 'nullable|string|max:255',
            'alamat_saksi1' => 'nullable|string',
            // Saksi 2
            'nik_saksi2' => 'nullable|string|max:255',
            'nama_saksi2' => 'nullable|string|max:255',
            'umur_saksi2' => 'nullable|integer|min:0',
            'pekerjaan_saksi2' => 'nullable|string|max:255',
            'alamat_saksi2' => 'nullable|string',
            // Berkas persyaratan
            'berkas_kk' => 'required|file|max:10240',
        ]);

        Log::info('Validation passed for user ID: ' . $userId);

        // Handle the file uploads
        $path_surat_keterangan_lahir = $request->file('surat_keterangan_lahir') ? $request->file('surat_keterangan_lahir')->storeAs('surat_keterangan_lahir', uniqid() . '_' . $request->file('surat_keterangan_lahir')->getClientOriginalName(), 'public') : null;
        $path_berkas_ktp_ibu = $request->file('berkas_ktp_ibu')->storeAs('berkas_ktp_ibu', uniqid() . '_' . $request->file('berkas_ktp_ibu')->getClientOriginalName(), 'public');
        $path_berkas_ktp_ayah = $request->file('berkas_ktp_ayah')->storeAs('berkas_ktp_ayah', uniqid() . '_' . $request->file('berkas_ktp_ayah')->getClientOriginalName(), 'public');
        $path_berkas_kk = $request->file('berkas_kk')->storeAs('berkas_kk', uniqid() . '_' . $request->file('berkas_kk')->getClientOriginalName(), 'public');

        Log::info('Files uploaded by user ID: ' . $userId);

        // Store the data into the database
        $kelahiran = new Kelahiran();
        $kelahiran->user_id = $userId;
        // Anak
        $kelahiran->nama_anak = $request->nama_anak;
        $kelahiran->jenis_kelamin = $request->jenis_kelamin;
        $kelahiran->tempat_dilahirkan = $request->tempat_dilahirkan;
        $kelahiran->tempat_kelahiran = $request->tempat_kelahiran;
        $kelahiran->hari = $request->hari;
        $kelahiran->tanggal_lahir = $request->tanggal_lahir;
        $kelahiran->jam = $request->jam;
        $kelahiran->jenis_kelahiran = $request->jenis_kelahiran;
        $kelahiran->kelahiran = $request->kelahiran;
        $kelahiran->penolong_kelahiran = $request->penolong_kelahiran;
        $kelahiran->berat_bayi = $request->berat_bayi;
        $kelahiran->panjang_bayi = $request->panjang_bayi;
        $kelahiran->surat_keterangan_lahir = $path_surat_keterangan_lahir;
        //
        // Ibu
        $kelahiran->nik_ibu = $request->nik_ibu;
        $kelahiran->nama_ibu = $request->nama_ibu;
        $kelahiran->tanggal_lahir_ibu = $request->tanggal_lahir_ibu;
        $kelahiran->umur_ibu = $request->umur_ibu;
        $kelahiran->pekerjaan_ibu = $request->pekerjaan_ibu;
        $kelahiran->alamat_ibu = $request->alamat_ibu;
        $kelahiran->kewarganegaraan_ibu = $request->kewarganegaraan_ibu;
        $kelahiran->kebangsaan_ibu = $request->kebangsaan_ibu;
        $kelahiran->tanggal_pernikahan = $request->tanggal_pernikahan;
        $kelahiran->berkas_ktp_ibu = $path_berkas_ktp_ibu;
        // Ayah
        $kelahiran->nik_ayah = $request->nik_ayah;
        $kelahiran->nama_ayah = $request->nama_ayah;
        $kelahiran->tanggal_lahir_ayah = $request->tanggal_lahir_ayah;
        $kelahiran->umur_ayah = $request->umur_ayah;
        $kelahiran->pekerjaan_ayah = $request->pekerjaan_ayah;
        $kelahiran->alamat_ayah = $request->alamat_ayah;
        $kelahiran->kewarganegaraan_ayah = $request->kewarganegaraan_ayah;
        $kelahiran->kebangsaan_ayah = $request->kebangsaan_ayah;
        $kelahiran->berkas_ktp_ayah = $path_berkas_ktp_ayah;
        // Pelapor
        $kelahiran->nik_pelapor = $request->nik_pelapor;
        $kelahiran->nama_pelapor = $request->nama_pelapor;
        $kelahiran->umur_pelapor = $request->umur_pelapor;
        $kelahiran->jenis_kelamin_pelapor = $request->jenis_kelamin_pelapor;
        $kelahiran->pekerjaan_pelapor = $request->pekerjaan_pelapor;
        $kelahiran->alamat_pelapor = $request->alamat_pelapor;
        // Saksi 1
        $kelahiran->nik_saksi1 = $request->nik_saksi1;
        $kelahiran->nama_saksi1 = $request->nama_saksi1;
        $kelahiran->umur_saksi1 = $request->umur_saksi1;
        $kelahiran->pekerjaan_saksi1 = $request->pekerjaan_saksi1;
        $kelahiran->alamat_saksi1 = $request->alamat_saksi1;
        // Saksi 2
        $kelahiran->nik_saksi2 = $request->nik_saksi2;
        $kelahiran->nama_saksi2 = $request->nama_saksi2;
        $kelahiran->umur_saksi2 = $request->umur_saksi2;
        $kelahiran->pekerjaan_saksi2 = $request->pekerjaan_saksi2;
        $kelahiran->alamat_saksi2 = $request->alamat_saksi2;
        // Berkas persyaratan
        $kelahiran->berkas_kk = $path_berkas_kk;
        // Status dan keterangan default
        $kelahiran->status = 'Data Sedang Diperiksa';
        $kelahiran->keterangan = 'Menunggu Konfirmasi';
        $kelahiran->nomor_surat = 'belum ada';
        // Simpan data
        $kelahiran->save();
    
        // Redirect dengan pesan sukses
        return redirect()->route('kelahiran.index')->with('success', 'Data kelahiran berhasil disimpan.');
    }
    
    public function index()
    {
        $user = Auth::user();
        if ($user->usertype === 'user') {
            $data = Kelahiran::where('user_id', $user->id)->get();
        } else {
            $data = Kelahiran::all();
        }

        return view('surat.listKelahiran', compact('data'));
    }
}