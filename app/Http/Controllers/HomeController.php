<?php

namespace App\Http\Controllers;

use App\Models\Kematian;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function adminKematian()
    {
        $pengajuanSurat = Kematian::paginate(5); // Menampilkan 10 data per halaman
        return view('admin.pengajuan.pengajuan_kematian', compact('pengajuanSurat'));
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'nomor_surat' => 'required',
            'status' => 'required|in:Data Sedang Diperiksa,Penandatanganan,Selesai,Ditolak',
            'keterangan' => 'required',
        ]);

        $pengajuan = Kematian::findOrFail($id);
        $pengajuan->nomor_surat = $request->nomor_surat;
        $pengajuan->status = $request->status;
        $pengajuan->keterangan = $request->keterangan;
        $pengajuan->save();

        return redirect()->back()->with('success', 'Status pengajuan berhasil diperbarui.');
    }
    public function destroy($id)
    {
        // Cari data pengajuan berdasarkan ID
        $pengajuan = Kematian::findOrFail($id);

        // Hapus data pengajuan
        $pengajuan->delete();

        // Redirect ke halaman sebelumnya dengan pesan sukses
        return redirect()->back()->with('success', 'Pengajuan berhasil dihapus.');
    }
}
