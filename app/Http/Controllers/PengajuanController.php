<?php

namespace App\Http\Controllers;

use App\Models\Kematian;
use Illuminate\Http\Request;

class PengajuanController extends Controller
{
    public function adminKematian()
    {
        $pengajuanSurat = Kematian::all(); // Ambil semua pengajuan surat kematian

        return view('admin.pengajuan.pengajuan_kematian', compact('pengajuanSurat'));
    }

}
