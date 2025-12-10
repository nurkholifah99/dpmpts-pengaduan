<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    // Dashboard Admin
    public function index()
    {
        $total         = Pengaduan::count();
        $menunggu      = Pengaduan::where('status', 'menunggu')->count();
        $verifikasi    = Pengaduan::where('status', 'verifikasi')->count();
        $rekomendasi   = Pengaduan::where('status', 'rekomendasi')->count();
        $tindak_lanjut = Pengaduan::where('status', 'tindak_lanjut')->count();
        $selesai       = Pengaduan::where('status', 'selesai')->count();

        $pengaduan = Pengaduan::latest()->get();

        return view('admin.dashboard', compact(
            'total','menunggu','verifikasi','rekomendasi','tindak_lanjut','selesai','pengaduan'
        ));
    }

    // Update Status
    public function updateStatus(Request $request, Pengaduan $pengaduan)
    {
        $request->validate([
            'status' => 'required|in:menunggu,verifikasi,rekomendasi,tindak_lanjut,selesai'
        ]);

        $pengaduan->update(['status' => $request->status]);

        return back()->with('success', 'Status pengaduan berhasil diperbarui');
    }

    // HAPUS PENGADUAN + LAMPIRAN
    public function destroy(Pengaduan $pengaduan)
    {
        // Hapus file lampiran dari storage kalau ada
        if ($pengaduan->lampiran) {
            foreach ($pengaduan->lampiran as $file) {
                Storage::disk('public')->delete($file);
            }
        }

        $pengaduan->delete();

        return back()->with('deleted', 'Pengaduan berhasil dihapus permanen beserta lampirannya!');
    }
}