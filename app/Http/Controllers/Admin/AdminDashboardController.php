<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pengaduan;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $total         = Pengaduan::count();
        $menunggu      = Pengaduan::where('status', 'menunggu')->count();
        $verifikasi    = Pengaduan::where('status', 'verifikasi')->count();
        $rekomendasi   = Pengaduan::where('status', 'rekomendasi')->count();
        $tindak_lanjut = Pengaduan::where('status', 'tindak_lanjut')->count();
        $selesai       = Pengaduan::where('status', 'selesai')->count();

        return view('admin.dashboard', compact(
            'total','menunggu','verifikasi',
            'rekomendasi','tindak_lanjut','selesai'
        ));
    }
}