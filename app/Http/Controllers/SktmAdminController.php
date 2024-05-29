<?php

namespace App\Http\Controllers;

use App\Models\Sktm;
use Illuminate\Http\Request;

class SktmAdminController extends Controller
{

    public function adminSktm()
    {
        $pengajuanSurat = Sktm::paginate(10); // Menampilkan 10 data per halaman
        return view('admin.pengajuan.pengajuan_sktm', compact('pengajuanSurat'));
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'nomor_surat' => 'required',
            'status' => 'required|in:Data Sedang Diperiksa,Penandatanganan,Selesai,Ditolak',
            'keterangan' => 'required',
        ]);

        $pengajuan = Sktm::findOrFail($id);
        $pengajuan->nomor_surat = $request->nomor_surat;
        $pengajuan->status = $request->status;
        $pengajuan->keterangan = $request->keterangan;
        $pengajuan->save();

        return redirect()->back()->with('success', 'Status pengajuan berhasil diperbarui.');
    }
}
