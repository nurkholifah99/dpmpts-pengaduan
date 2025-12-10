<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\MasyarakatController;
use App\Http\Controllers\Admin\PengaduanAdminController;   // ← Controller khusus Admin
use App\Http\Controllers\Admin\AdminDashboardController;

// Landing & Masyarakat
Route::get('/', fn() => view('dashboard'))->name('dashboard');

Route::get('/pengaduan', [PengaduanController::class, 'create'])->name('pengaduan.create');
Route::post('/pengaduan', [PengaduanController::class, 'store'])->name('pengaduan.store');
Route::get('/pengaduan/{id}', [PengaduanController::class, 'status'])->name('pengaduan.status');

// Tracking untuk masyarakat
Route::get('/tracking', [MasyarakatController::class, 'index'])->name('tracking.index');
Route::post('/tracking', [MasyarakatController::class, 'cekStatus'])->name('tracking.cek');

// === ADMIN AREA ===
Route::prefix('admin')->name('admin.')->group(function () {

    // Dashboard Admin (hanya statistik)
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])
        ->name('dashboard');

    // Resource Pengaduan khusus Admin (list, detail, update status, delete)
    Route::resource('pengaduan', PengaduanAdminController::class)
        ->except(['create', 'store', 'edit']); // kita tidak butuh create/store/edit

    // Update status cepat (digunakan oleh select onchange di list)
    Route::put('pengaduan/{pengaduan}/status', [PengaduanAdminController::class, 'updateStatus'])
        ->name('PengaduanAdminController.updateStatus');
});