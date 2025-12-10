<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use Illuminate\Http\Request;

class MasyarakatController extends Controller
{
    public function index(Request $request)
    {
        $pengaduan = collect();
        $search = $request->query('search');

        if ($search) {
            $pengaduan = Pengaduan::where('nik', $search)
                ->orWhere('nama', 'like', '%' . $search . '%')
                ->orWhere('no_hp', 'like', '%' . $search . '%')
                ->latest()
                ->get();
        }

        return view('tracking.index', compact('pengaduan', 'search'));
    }
}