<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\MasyarakatController;
use App\Http\Controllers\Auth\AdminAuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PengaduanAdminController;

// === HALAMAN PUBLIK (MASYARAKAT - TANPA LOGIN) ===
Route::get('/', fn() => view('dashboard'))->name('dashboard');

Route::get('/pengaduan', [PengaduanController::class, 'create'])->name('pengaduan.create');
Route::post('/pengaduan', [PengaduanController::class, 'store'])->name('pengaduan.store');

Route::get('/tracking', [MasyarakatController::class, 'index'])->name('tracking.index');
Route::post('/tracking', [MasyarakatController::class, 'cek'])->name('tracking.cek');

Route::get('/pengaduan/{id}', [PengaduanController::class, 'status'])->name('pengaduan.status');

// === ADMIN LOGIN ===
Route::get('/admin/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminAuthController::class, 'login'])->name('admin.login.post');
Route::post('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

// === ADMIN AREA (DENGAN MIDDLEWARE) ===
Route::middleware('admin')->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/pengaduan', [PengaduanAdminController::class, 'index'])->name('pengaduan.index');
    Route::get('/pengaduan/{pengaduan}', [PengaduanAdminController::class, 'show'])->name('pengaduan.show');
    Route::patch('/pengaduan/{pengaduan}/status', [PengaduanAdminController::class, 'updateStatus'])->name('pengaduan.updateStatus');
    Route::delete('/pengaduan/{pengaduan}', [PengaduanAdminController::class, 'destroy'])->name('pengaduan.destroy');
});