<?php

namespace App\Http\Controllers;

use App\Models\Usaha;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Barryvdh\DomPDF\Facade\Pdf;

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

        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'nik' => 'required|string|size:16', // Ensures exactly 16 characters
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'status_pernikahan' => 'required|in:Belum Menikah,Menikah,Duda,Janda',
            'alamat' => 'required|string',
            'usaha' => 'required|string|max:255',
            'lokasi' => 'required|string|max:255',
            'lama_usaha' => 'required|string|max:255',
            'berkas_ktp' => 'required|file|max:10240',
            'berkas_kk' => 'required|file|max:10240',
            'bukti_usaha' => 'nullable|file|max:10240',
        ]);

        Log::info('Validation passed for user ID: ' . auth()->id());

        // Handle file uploads with unique names
        $berkasKTP = $request->file('berkas_ktp');
        $namaFileKTP = Str::uuid() . '.' . $berkasKTP->getClientOriginalExtension();
        $pathKTP = $berkasKTP->storeAs('berkas_ktp', $namaFileKTP, 'public');

        $berkasKK = $request->file('berkas_kk');
        $namaFileKK = Str::uuid() . '.' . $berkasKK->getClientOriginalExtension();
        $pathKK = $berkasKK->storeAs('berkas_kk', $namaFileKK, 'public');

        $pathBuktiUsaha = null;
        if ($request->hasFile('bukti_usaha')) {
            $buktiUsaha = $request->file('bukti_usaha');
            $namaFileBuktiUsaha = Str::uuid() . '.' . $buktiUsaha->getClientOriginalExtension();
            $pathBuktiUsaha = $buktiUsaha->storeAs('bukti_usaha', $namaFileBuktiUsaha, 'public');
        }

        Log::info('Files uploaded by user ID: ' . auth()->id() . ' to paths: KTP - ' . $pathKTP . ', KK - ' . $pathKK . ', Bukti Usaha - ' . $pathBuktiUsaha);

        // Save the Usaha data
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
        $usaha->berkas_ktp = $pathKTP;
        $usaha->berkas_kk = $pathKK;
        $usaha->bukti_usaha = $pathBuktiUsaha;
        $usaha->status = 'Data Sedang Diperiksa';
        $usaha->keterangan = 'Menunggu Konfirmasi';
        $usaha->nomor_surat = 'belum ada';
        $usaha->save();

        Log::info('Data saved for user ID: ' . auth()->id());

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
    public function cetak($id)
    {
        set_time_limit(300); // Extend execution time

        $data = Usaha::findOrFail($id);

        $pdf = PDF::loadView('surat.usaha_pdf', compact('data'));
        return $pdf->download('Surat_Keterangan_Usaha.pdf');
    }
}