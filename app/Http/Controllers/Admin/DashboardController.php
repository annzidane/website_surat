<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Kematian;

class DashboardController extends Controller
{
    public function index()
    {
        $userCount = User::count();
        $kematianCount = Kematian::count();

        return view('admin.dashboard', compact('userCount', 'kematianCount'));
    }
}
