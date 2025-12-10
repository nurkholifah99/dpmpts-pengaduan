<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PengaduanController extends Controller
{
    public function create()
    {
        return view('pengaduan.form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama'             => 'required|string|max:255',
            'nik'              => 'required|digits:16',
            'email'            => 'required|email',
            'no_hp'            => 'required|numeric',
            'alamat'           => 'required|string',
            'subjek_pengaduan' => 'required|string|max:255',
            'isi_pengaduan'    => 'required|string',
            'lampiran.*'       => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:5120'
        ]);

        $lampiranPaths = [];
        if ($request->hasFile('lampiran')) {
            foreach ($request->file('lampiran') as $file) {
                $path = $file->store('pengaduan/lampiran', 'public');
                $lampiranPaths[] = $path;
            }
        }

        $pengaduan = Pengaduan::create([
            'nama'             => $request->nama,
            'nik'              => $request->nik,
            'email'            => $request->email,
            'no_hp'            => $request->no_hp,
            'alamat'           => $request->alamat,
            'subjek_pengaduan' => $request->subjek_pengaduan,
            'isi_pengaduan'    => $request->isi_pengaduan,
            'lampiran'         => $lampiranPaths,
            'status'           => 'menunggu'
        ]);

        return redirect()->route('pengaduan.create')
            ->with('success', "Pengaduan berhasil dikirim! Nomor Pengaduan: #{$pengaduan->id}");
    }

    public function status($id)
    {
        $pengaduan = Pengaduan::findOrFail($id);
        return view('pengaduan.status', compact('pengaduan'));
    }
}