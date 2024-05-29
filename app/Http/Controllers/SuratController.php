<?php

namespace App\Http\Controllers;

use App\Models\Kematian;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class SuratController extends Controller
{
    public function kematian()
    {
        return view('surat.kematian');
    }

    public function kematianStore(Request $request)
    {
        // Check if user is authenticated
        $userId = auth()->id();
        if (!$userId) {
            return redirect('/login')->with('error', 'Please login to submit the form.');
        }

        Log::info('User ID: ' . auth()->id() . ' is trying to store data.');

        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'bin_binti' => 'required|string|max:255',
            'nik' => 'required|string|max:16',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'status_pernikahan' => 'required|in:Belum Menikah,Menikah,Duda,Janda',
            'pekerjaan' => 'required|string|max:255',
            'alamat' => 'required|string',
            'tanggal_meninggal' => 'required|date',
            'jam_meninggal' => 'required|date_format:H:i',
            'tempat_meninggal' => 'required|string|max:255',
            'sebab_meninggal' => 'required|string|max:255',
            'umur' => 'required|string|max:16',
            'agama' => 'required|in:Islam,Kristen,Katholik,Hindu,Buddha,Konghucu',
            'nama_pelapor' => 'required|string|max:255',
            'nik_pelapor' => 'required|string|max:16',
            'tanggal_lahir_pelapor' => 'required|date',
            'pekerjaan_pelapor' => 'required|string|max:255',
            'alamat_pelapor' => 'required|string',
            'hubungan_pelapor' => 'required|string|max:255',
            'berkas_ktp' => 'required|file|max:10240',
            'berkas_kk' => 'required|file|max:10240',
            'berkas_surat_kematian' => 'nullable|file|max:10240',
        ]);

        Log::info('Validation passed for user ID: ' . auth()->id());

        // Simpan berkas pelapor dengan nama unik
        $berkasKtp = $request->file('berkas_ktp');
        $namaFileKtp = Str::uuid() . '.' . $berkasKtp->getClientOriginalExtension();
        $pathKtp = $berkasKtp->storeAs('berkas_pelapor', $namaFileKtp, 'public');

        $berkasKk = $request->file('berkas_kk');
        $namaFileKk = Str::uuid() . '.' . $berkasKk->getClientOriginalExtension();
        $pathKk = $berkasKk->storeAs('berkas_pelapor', $namaFileKk, 'public');

        // Simpan berkas surat kematian jika ada dengan nama unik
        $pathSuratKematian = null;
        if ($request->hasFile('berkas_surat_kematian')) {
            $berkasSuratKematian = $request->file('berkas_surat_kematian');
            $namaFileSuratKematian = Str::uuid() . '.' . $berkasSuratKematian->getClientOriginalExtension();
            $pathSuratKematian = $berkasSuratKematian->storeAs('berkas_surat_kematian', $namaFileSuratKematian, 'public');
        }

        // Simpan data pengajuan
        $kematian = new Kematian();
        $kematian->user_id = auth()->id();
        $kematian->nama = $request->nama;
        $kematian->bin_binti = $request->bin_binti;
        $kematian->nik = $request->nik;
        $kematian->jenis_kelamin = $request->jenis_kelamin;
        $kematian->tempat_lahir = $request->tempat_lahir;
        $kematian->tanggal_lahir = $request->tanggal_lahir;
        $kematian->status_pernikahan = $request->status_pernikahan;
        $kematian->pekerjaan = $request->pekerjaan;
        $kematian->alamat = $request->alamat;
        $kematian->tanggal_meninggal = $request->tanggal_meninggal;
        $kematian->jam_meninggal = $request->jam_meninggal;
        $kematian->tempat_meninggal = $request->tempat_meninggal;
        $kematian->sebab_meninggal = $request->sebab_meninggal;
        $kematian->umur = $request->umur;
        $kematian->agama = $request->agama;
        $kematian->nama_pelapor = $request->nama_pelapor;
        $kematian->nik_pelapor = $request->nik_pelapor;
        $kematian->tanggal_lahir_pelapor = $request->tanggal_lahir_pelapor;
        $kematian->pekerjaan_pelapor = $request->pekerjaan_pelapor;
        $kematian->alamat_pelapor = $request->alamat_pelapor;
        $kematian->hubungan_pelapor = $request->hubungan_pelapor;
        $kematian->berkas_ktp = $pathKtp;
        $kematian->berkas_kk = $pathKk;
        $kematian->berkas_surat_kematian = $pathSuratKematian;
        $kematian->status = 'Data Sedang Diperiksa';
        $kematian->keterangan = 'Menunggu Konfirmasi';
        $kematian->save();

        Log::info('Data saved for user ID: ' . auth()->id());

        // Redirect atau berikan respons sesuai kebutuhan Anda
        return redirect()->route('kematian.index')->with('success', 'Data berhasil disimpan.');
    }

    public function index()
    {
        $user = Auth::user();
        if ($user->usertype === 'user') {
            $data = Kematian::where('user_id', $user->id)->get();
        } else {
            $data = Kematian::all();
        }

        return view('surat.listKematian', compact('data'));
    }

    public function cetak($id)
    {
        $data = Kematian::findOrFail($id);
        $pdf = PDF::loadView('surat.kematian_pdf', compact('data'));

        return $pdf->download('surat_kematian.pdf');
    }
    
}
