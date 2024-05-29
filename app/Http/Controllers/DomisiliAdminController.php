<?php

namespace App\Http\Controllers;

use App\Models\Domisili;
use Illuminate\Http\Request;

class DomisiliAdminController extends Controller
{

    public function adminDomisili()
    {
        $pengajuanSurat = Domisili::paginate(10); // Menampilkan 10 data per halaman
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
}
