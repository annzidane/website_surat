<?php

namespace App\Http\Controllers;

use App\Models\Kematian;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return view('admin.dashboard');
    }
    // public function adminKematian(){
    //     return view('admin.pengajuan.pengajuan_kematian');
    // }

    public function adminKematian()
    {
        $pengajuanSurat = Kematian::all(); // Ambil semua pengajuan surat kematian

        return view('admin.pengajuan.pengajuan_kematian', compact('pengajuanSurat'));
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:Data Sedang Diperiksa,Penandatanganan,Selesai,Ditolak',
            'keterangan' => 'required',
        ]);

        $pengajuan = Kematian::findOrFail($id);
        $pengajuan->status = $request->status;
        $pengajuan->keterangan = $request->keterangan;
        $pengajuan->save();

        return redirect()->back()->with('success', 'Status pengajuan berhasil diperbarui.');
    }


}
