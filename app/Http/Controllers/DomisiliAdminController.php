<?php

namespace App\Http\Controllers;

use App\Models\Domisili;
use App\Models\Usaha;
use Illuminate\Http\Request;

class DomisiliAdminController extends Controller
{

    public function adminDomisili()
    {
        $pengajuanSurat = Domisili::all(); // Ambil semua pengajuan surat kematian

        return view('admin.pengajuan.pengajuan_domisili', compact('pengajuanSurat'));
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:Data Sedang Diperiksa,Penandatanganan,Selesai,Ditolak',
            'keterangan' => 'required',
        ]);

        $pengajuan = Domisili::findOrFail($id);
        $pengajuan->status = $request->status;
        $pengajuan->keterangan = $request->keterangan;
        $pengajuan->save();

        return redirect()->back()->with('success', 'Status pengajuan berhasil diperbarui.');
    }


}
