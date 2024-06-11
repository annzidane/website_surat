<?php

namespace App\Http\Controllers;

use App\Models\Domisili;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class DomisiliAdminController extends Controller
{
    public function adminDomisili()
    {
        $pengajuanSurat = Domisili::paginate(5); // Menampilkan 10 data per halaman
        return view('admin.pengajuan.pengajuan_domisili', compact('pengajuanSurat'));
    }
    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'nomor_surat' => 'required',
            'keterangan_domisili' =>'required',
            'status' => 'required|in:Data Sedang Diperiksa,Penandatanganan,Selesai,Ditolak',
            'keterangan' => 'required',
        ]);

        $pengajuan = Domisili::findOrFail($id);
        $pengajuan->nomor_surat = $request->nomor_surat;
        $pengajuan->keterangan_domisili = $request->keterangan_domisili;
        $pengajuan->status = $request->status;
        $pengajuan->keterangan = $request->keterangan;
        $pengajuan->save();
        return redirect()->back()->with('success', 'Status pengajuan berhasil diperbarui.');
    }
    public function destroy($id)
    {
        // Cari data pengajuan berdasarkan ID
        $pengajuan = Domisili::findOrFail($id);

        // Hapus data pengajuan
        $pengajuan->delete();

        // Redirect ke halaman sebelumnya dengan pesan sukses
        return redirect()->back()->with('success', 'Pengajuan berhasil dihapus.');
    }

    public function cetak($id)
    {
        $data = Domisili::findOrFail($id);
        $pdf = PDF::loadView('surat.domisili_pdf', compact('data'));

        return $pdf->download('surat_domisili.pdf');
    }

}
