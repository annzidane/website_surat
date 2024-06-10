<?php

namespace App\Http\Controllers;

use App\Models\Nikah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Barryvdh\DomPDF\Facade\Pdf;

class NikahController extends Controller
{
    public function nikah()
    {
        return view('surat.nikah');
    }
    public function nikahStore(Request $request)
    {
        // Check if user is authenticated
        $userId = auth()->id();
        if (!$userId) {
            return redirect('/login')->with('error', 'Please login to submit the form.');
        }
    
        Log::info('User ID: ' . $userId . ' is trying to store nikah data.');
    
        // Validasi data
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'kewarganegaraan' => 'required|string|max:255',
            'agama' => 'required|string|max:255',
            'pekerjaan' => 'required|string|max:255',
            'alamat' => 'required|string',
            'nomor_kk' => 'required|string|max:255',
            'nik' => 'required|string|size:16', // Ensures exactly 16 characters
            'foto_ktp' => 'required|file|max:10240', // maksimal 10MB
            'surat_pernyataan' => 'required|file|max:10240',
        ]);
    
        Log::info('Validation passed for user ID: ' . $userId);
    
        // Handle file uploads with unique names
        $fotoKtp = $request->file('foto_ktp');
        $namaFileKtp = Str::uuid() . '.' . $fotoKtp->getClientOriginalExtension();
        $pathKtp = $fotoKtp->storeAs('foto_ktp', $namaFileKtp, 'public');
    
        $suratPernyataan = $request->file('surat_pernyataan');
        $namaFileSuratPernyataan = Str::uuid() . '.' . $suratPernyataan->getClientOriginalExtension();
        $pathSuratPernyataan = $suratPernyataan->storeAs('surat_pernyataan', $namaFileSuratPernyataan, 'public');
    
        Log::info('Files uploaded by user ID: ' . $userId . ' to paths: KTP - ' . $pathKtp . ', Surat Pernyataan - ' . $pathSuratPernyataan);
    
        // Save the Nikah data
        $formNikah = new Nikah();
        $formNikah->user_id = $userId;
        $formNikah->nama = $validatedData['nama'];
        $formNikah->jenis_kelamin = $validatedData['jenis_kelamin'];
        $formNikah->tempat_lahir = $validatedData['tempat_lahir'];
        $formNikah->tanggal_lahir = $validatedData['tanggal_lahir'];
        $formNikah->kewarganegaraan = $validatedData['kewarganegaraan'];
        $formNikah->agama = $validatedData['agama'];
        $formNikah->pekerjaan = $validatedData['pekerjaan'];
        $formNikah->alamat = $validatedData['alamat'];
        $formNikah->nomor_kk = $validatedData['nomor_kk'];
        $formNikah->nik = $validatedData['nik'];
        $formNikah->foto_ktp = $pathKtp;
        $formNikah->surat_pernyataan = $pathSuratPernyataan;
        $formNikah->status = 'Data Sedang Diperiksa';
        $formNikah->keterangan = 'Menunggu Konfirmasi';
        $formNikah->nomor_surat = 'belum ada';
        $formNikah->save();
    
        Log::info('Data saved for user ID: ' . $userId);
    
        return redirect()->route('nikah.index')->with('success', 'Data nikah berhasil disimpan.');
    }

    public function index()
    {
        $user = Auth::user();
        if ($user->usertype === 'user') {
            $data = Nikah::where('user_id', $user->id)->get();
        } else {
            $data = Nikah::all();
        }
        return view('surat.listNikah', compact('data'));
    }
    public function cetak($id)
    {
        $data = Nikah::findOrFail($id);
        $pdf = PDF::loadView('surat.nikah_pdf', compact('data'));

        return $pdf->download('surat_pengantar_nikah.pdf');
    }
}