<?php

namespace App\Http\Controllers;

use App\Models\Kelahiran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class KelahiranAdminController extends Controller
{

    public function adminKelahiran()
    {
        $pengajuanSurat = Kelahiran::paginate(5); // Menampilkan 10 data per halaman
        return view('admin.pengajuan.pengajuan_kelahiran', compact('pengajuanSurat'));
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'nomor_surat' => 'required',
            'status' => 'required|in:Data Sedang Diperiksa,Penandatanganan,Selesai,Ditolak',
            'keterangan' => 'required',
            'surat_kelahiran' => 'nullable|file|mimes:pdf,doc,docx|max:2048', // validasi file
        ]);

        $pengajuan = Kelahiran::findOrFail($id);
        $pengajuan->nomor_surat = $request->nomor_surat;
        $pengajuan->status = $request->status;
        $pengajuan->keterangan = $request->keterangan;

        // Handle file upload
        if ($request->hasFile('surat_kelahiran')) {
            // Hapus file lama jika ada
            if ($pengajuan->surat_kelahiran) {
                Storage::delete('public/surat_kelahiran/' . $pengajuan->surat_kelahiran);
            }

            // Simpan file baru
            $file = $request->file('surat_kelahiran');
            $hashedFileName = Hash::make($file->getClientOriginalName()) . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/surat_kelahiran', $hashedFileName);

            // Simpan nama file yang di-hash ke database
            $pengajuan->surat_kelahiran = $hashedFileName;
        }
        $pengajuan->save();

        return redirect()->back()->with('success', 'Status pengajuan berhasil diperbarui.');
    }
    public function destroy($id)
    {
        // Cari data pengajuan berdasarkan ID
        $pengajuan = Kelahiran::findOrFail($id);

        // Hapus data pengajuan
        $pengajuan->delete();

        // Redirect ke halaman sebelumnya dengan pesan sukses
        return redirect()->back()->with('success', 'Pengajuan berhasil dihapus.');
    }
}
