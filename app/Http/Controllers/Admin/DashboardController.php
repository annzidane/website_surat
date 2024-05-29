<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Domisili;
use App\Models\Kelahiran;
use App\Models\User;
use App\Models\Kematian;
use App\Models\Pindah;
use App\Models\Sktm;
use App\Models\Usaha;

class DashboardController extends Controller
{
    public function index()
    {
        $userCount = User::count();
        $kematianCount = Kematian::count();
        $usahaCount = Usaha::count();
        $domisiliCount = Domisili::count();
        $kelahiranCount = Kelahiran::count();
        $pindahCount = Pindah::count();
        $sktmCount = Sktm::count();

        return view('admin.dashboard', compact('userCount', 'kematianCount', 'usahaCount', 'domisiliCount', 'kelahiranCount', 'pindahCount', 'sktmCount'));
    }
    
}
