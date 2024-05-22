<?php

use App\Http\Controllers\DomisiliAdminController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\SuratController;
use App\Http\Controllers\UsahaController;
use App\Http\Controllers\PengajuanController;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\DomisiliController;
use App\Http\Controllers\UsahaAdminController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';



route::get('admin/dashboard', [HomeController::class, 'index'])->middleware(['auth','admin']);

Route::get('/admin/kematian', [HomeController::class, 'adminKematian'])->middleware(['auth', 'admin']);

Route::get('/admin/usaha', [UsahaAdminController::class, 'adminUsaha'])->middleware(['auth', 'admin']);

Route::get('/admin/domisili', [DomisiliAdminController::class, 'adminDomisili'])->middleware(['auth', 'admin']);

Route::patch('/surat/update/{id}', [HomeController::class, 'updateStatus'])->name('surat.updateStatus');

Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');


Route::middleware(['auth'])->group(function () {
    Route::post('/kematian/store', [SuratController::class, 'kematianStore'])->name('kematian.store');
    Route::get('/kematian', [SuratController::class, 'kematian'])->name('kematian');
    Route::get('/kematian/index', [SuratController::class, 'index'])->name('kematian.index');
    Route::get('/kematian/cetak/{id}', [SuratController::class, 'cetak'])->name('kematian.cetak');
});

Route::middleware(['auth'])->group(function () {
    Route::post('/usaha/store', [UsahaController::class, 'usahaStore'])->name('usaha.store');
    Route::get('/usaha', [UsahaController::class, 'usaha'])->name('usaha');
    Route::get('/usaha/index', [UsahaController::class, 'index'])->name('usaha.index');
    Route::get('/usaha/cetak/{id}', [UsahaController::class, 'cetak'])->name('usaha.cetak');
});

Route::middleware(['auth'])->group(function () {
    Route::post('/domisili/store', [DomisiliController::class, 'domisiliStore'])->name('domisili.store');
    Route::get('/domisili', [DomisiliController::class, 'domisili'])->name('domisili');
    Route::get('/domisili/index', [DomisiliController::class, 'index'])->name('domisili.index');
    Route::get('/domisili/cetak/{id}', [DomisiliController::class, 'cetak'])->name('domisili.cetak');
});