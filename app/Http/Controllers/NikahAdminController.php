<?php

namespace App\Http\Controllers;

use App\Models\Nikah;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class NikahAdminController extends Controller
{
    public function adminNikah()
    {
        $pengajuanSurat = Nikah::paginate(5); // Menampilkan 10 data per halaman
        return view('admin.pengajuan.pengajuan_nikah', compact('pengajuanSurat'));
    }
    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'nomor_surat' => 'required',
            'status' => 'required|in:Data Sedang Diperiksa,Penandatanganan,Selesai,Ditolak',
            'keterangan' => 'required',
        ]);

        $pengajuan = Nikah::findOrFail($id);
        $pengajuan->nomor_surat = $request->nomor_surat;
        $pengajuan->status = $request->status;
        $pengajuan->keterangan = $request->keterangan;
        $pengajuan->save();

        return redirect()->back()->with('success', 'Status pengajuan berhasil diperbarui.');
    }
    public function destroy($id)
    {
        // Cari data pengajuan berdasarkan ID
        $pengajuan = Nikah::findOrFail($id);

        // Hapus data pengajuan
        $pengajuan->delete();

        // Redirect ke halaman sebelumnya dengan pesan sukses
        return redirect()->back()->with('success', 'Pengajuan berhasil dihapus.');
    }
    public function cetak($id)
    {
        $data = Nikah::findOrFail($id);
        $pdf = PDF::loadView('surat.nikah_pdf', compact('data'));

        return $pdf->download('surat_nikah.pdf');
    }
    
}
