<?php

use App\Http\Controllers\DomisiliAdminController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\SuratController;
use App\Http\Controllers\UsahaController;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\DomisiliController;
use App\Http\Controllers\KelahiranController;
use App\Http\Controllers\PindahController;
use App\Http\Controllers\SktmController;
use App\Http\Controllers\UsahaAdminController;
use App\Http\Controllers\KelahiranAdminController;
use App\Http\Controllers\NikahAdminController;
use App\Http\Controllers\NikahController;
use App\Http\Controllers\PindahAdminController;
use App\Http\Controllers\SktmAdminController;

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

Route::patch('/surat/update/{id}', [HomeController::class, 'updateStatus'])->name('surat.updateStatus')->middleware(['auth','admin']);

Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('rekap/download', [DashboardController::class, 'download'])->name('rekap.download');

    Route::get('/users', [UserController::class, 'index'])->name('admin.users');
    Route::patch('/users/update-password/{user}', [UserController::class, 'updatePassword'])->name('admin.user.updatePassword');
    Route::delete('/users/delete/{user}', [UserController::class, 'deleteUser'])->name('admin.user.delete');

    Route::get('kematian', [HomeController::class, 'adminKematian']);
    Route::patch('kematian/update/{id}', [HomeController::class, 'updateStatus'])->name('kematian.updateStatus');
    Route::delete('kematian/destroy/{id}', [HomeController::class, 'destroy'])->name('kematian.destroy');

    Route::get('usaha', [UsahaAdminController::class, 'adminUsaha']);
    Route::patch('usaha/update/{id}', [UsahaAdminController::class, 'updateStatus'])->name('usaha.updateStatus');
    Route::delete('usaha/destroy/{id}', [UsahaAdminController::class, 'destroy'])->name('usaha.destroy');
    
    Route::get('domisili', [DomisiliAdminController::class, 'adminDomisili']);
    Route::patch('domisili/update/{id}', [DomisiliAdminController::class, 'updateStatus'])->name('domisili.updateStatus');
    Route::delete('domisili/destroy/{id}', [DomisiliAdminController::class, 'destroy'])->name('domisili.destroy');
    
    Route::get('nikah', [NikahAdminController::class, 'adminNikah']);
    Route::patch('nikah/update/{id}', [NikahAdminController::class, 'updateStatus'])->name('nikah.updateStatus');
    Route::delete('nikah/destroy/{id}', [NikahAdminController::class, 'destroy'])->name('nikah.destroy');

    Route::get('kelahiran', [KelahiranAdminController::class, 'adminKelahiran']);
    Route::patch('kelahiran/update/{id}', [KelahiranAdminController::class, 'updateStatus'])->name('kelahiran.updateStatus');
    Route::delete('kelahiran/destroy/{id}', [KelahiranAdminController::class, 'destroy'])->name('kelahiran.destroy');
    
    Route::get('pindah', [PindahAdminController::class, 'adminPindah']);
    Route::patch('pindah/update/{id}', [PindahAdminController::class, 'updateStatus'])->name('pindah.updateStatus');
    Route::delete('pindah/destroy/{id}', [PindahAdminController::class, 'destroy'])->name('pindah.destroy');
    
    Route::get('sktm', [SktmAdminController::class, 'adminSktm']);
    Route::patch('sktm/update/{id}', [SktmAdminController::class, 'updateStatus'])->name('sktm.updateStatus');
    Route::delete('sktm/destroy/{id}', [SktmAdminController::class, 'destroy'])->name('sktm.destroy');
});


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

Route::middleware(['auth'])->group(function () {
    Route::post('/kelahiran/store', [KelahiranController::class, 'kelahiranStore'])->name('kelahiran.store');
    Route::get('/kelahiran', [KelahiranController::class, 'kelahiran'])->name('kelahiran');
    Route::get('/kelahiran/index', [KelahiranController::class, 'index'])->name('kelahiran.index');
    Route::get('/kelahiran/cetak/{id}', [KelahiranController::class, 'cetak'])->name('kelahiran.cetak');
});

Route::middleware(['auth'])->group(function () {
    Route::post('/pindah/store', [PindahController::class, 'pindahStore'])->name('pindah.store');
    Route::get('/pindah', [PindahController::class, 'pindah'])->name('pindah');
    Route::get('/pindah/index', [PindahController::class, 'index'])->name('pindah.index');
    Route::get('/pindah/cetak/{id}', [PindahController::class, 'cetak'])->name('pindah.cetak');
});

Route::middleware(['auth'])->group(function () {
    Route::post('/sktm/store', [SktmController::class, 'sktmStore'])->name('sktm.store');
    Route::get('/sktm', [SktmController::class, 'sktm'])->name('sktm');
    Route::get('/sktm/index', [SktmController::class, 'index'])->name('sktm.index');
    Route::get('/sktm/cetak/{id}', [SktmController::class, 'cetak'])->name('sktm.cetak');
});

Route::middleware(['auth'])->group(function () {
    Route::post('/nikah/store', [NikahController::class, 'nikahStore'])->name('nikah.store');
    Route::get('/nikah', [NikahController::class, 'nikah'])->name('nikah');
    Route::get('/nikah/index', [NikahController::class, 'index'])->name('nikah.index');
    Route::get('/nikah/cetak/{id}', [NikahController::class, 'cetak'])->name('nikah.cetak');
});

Route::get('/download-template-surat-pernyataan', function () {
    $filePath = public_path('tamplate/template-surat-pernyataan.docx');

    // Periksa apakah file template ada
    if (file_exists($filePath)) {
        // Jika ada, kembalikan sebagai file download
        return response()->download($filePath, 'template-surat-pernyataan.docx');
    } else {
        // Jika file tidak ditemukan, kembalikan pesan error
        return response()->json(['error' => 'File template not found.'], 404);
    }
})->name('download.template.surat.pernyataan');
