<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Domisili;
use App\Models\Kelahiran;
use App\Models\User;
use App\Models\Kematian;
use App\Models\Nikah;
use App\Models\Pindah;
use App\Models\Sktm;
use App\Models\Usaha;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;

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
        $nikahCount = Nikah::count();

        // Initialize data structure for the chart
        $suratData = [
            'January' => 0,
            'February' => 0,
            'March' => 0,
            'April' => 0,
            'May' => 0,
            'June' => 0,
            'July' => 0,
            'August' => 0,
            'September' => 0,
            'October' => 0,
            'November' => 0,
            'December' => 0,
        ];

        // Aggregate counts by month
        $this->aggregateMonthlyCounts($suratData, Kematian::all());
        $this->aggregateMonthlyCounts($suratData, Usaha::all());
        $this->aggregateMonthlyCounts($suratData, Domisili::all());
        $this->aggregateMonthlyCounts($suratData, Kelahiran::all());
        $this->aggregateMonthlyCounts($suratData, Pindah::all());
        $this->aggregateMonthlyCounts($suratData, Sktm::all());
        $this->aggregateMonthlyCounts($suratData, Nikah::all());

        return view('admin.dashboard', compact('userCount', 'kematianCount', 'usahaCount', 'domisiliCount', 'kelahiranCount', 'pindahCount', 'sktmCount', 'nikahCount', 'suratData'));
    }

    private function aggregateMonthlyCounts(&$suratData, $records)
    {
        foreach ($records as $record) {
            $month = Carbon::parse($record->created_at)->format('F');
            $suratData[$month]++;
        }
    }
    public function download()
    {
        $records = collect();
        $records = $records->merge(Kematian::all());
        $records = $records->merge(Usaha::all());
        $records = $records->merge(Domisili::all());
        $records = $records->merge(Kelahiran::all());
        $records = $records->merge(Pindah::all());
        $records = $records->merge(Sktm::all());
        $records = $records->merge(Nikah::all());

        // Sort records by created_at
        $records = $records->sortBy('created_at');

        $pdf = PDF::loadView('admin.rekap_surat', compact('records'));

        return $pdf->download('rekap_surat.pdf');
    }
}
