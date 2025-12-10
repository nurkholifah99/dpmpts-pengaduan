<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pengaduan;

class DashboardController extends Controller
{
    public function index()
    {
        $total = Pengaduan::count();
        $menunggu = Pengaduan::where('status', 'menunggu')->count();
        $proses = Pengaduan::whereIn('status', ['verifikasi', 'rekomendasi', 'tindak_lanjut'])->count();
        $selesai = Pengaduan::where('status', 'selesai')->count();

        return view('admin.dashboard', compact('total', 'menunggu', 'proses', 'selesai'));
    }
}