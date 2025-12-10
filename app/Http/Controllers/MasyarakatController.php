<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengaduan;

class MasyarakatController extends Controller
{
    // Halaman form tracking
   public function index()
{
    return view('tracking.index');
}

public function cekStatus(Request $request)
{
    $request->validate([
        'nama' => 'required'
    ]);

    $data = Pengaduan::where('nama', 'LIKE', '%' . $request->nama . '%')
        ->latest()
        ->first();

    if (!$data) {
        return back()->with('error', 'Pengaduan tidak ditemukan');
    }

    return back()->with('status', $data);
}


    
}
