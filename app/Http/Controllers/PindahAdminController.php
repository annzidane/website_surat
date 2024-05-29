<?php

namespace App\Http\Controllers;

use App\Models\Pindah;
use Illuminate\Http\Request;

class PindahAdminController extends Controller
{

    public function adminPindah()
    {
        $pengajuanSurat = Pindah::paginate(10); // Menampilkan 10 data per halaman
        return view('admin.pengajuan.pengajuan_pindah', compact('pengajuanSurat'));
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'nomor_surat' => 'required',
            'status' => 'required|in:Data Sedang Diperiksa,Penandatanganan,Selesai,Ditolak',
            'keterangan' => 'required',
        ]);

        $pengajuan = Pindah::findOrFail($id);
        $pengajuan->nomor_surat = $request->nomor_surat;
        $pengajuan->status = $request->status;
        $pengajuan->keterangan = $request->keterangan;
        $pengajuan->save();

        return redirect()->back()->with('success', 'Status pengajuan berhasil diperbarui.');
    }


}
