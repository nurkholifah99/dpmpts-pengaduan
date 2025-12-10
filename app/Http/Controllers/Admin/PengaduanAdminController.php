<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pengaduan;
use Illuminate\Http\Request;

class PengaduanAdminController extends Controller
{
    public function index()
    {
        $pengaduan = Pengaduan::latest()->paginate(15);
        return view('admin.pengaduan.index', compact('pengaduan'));
    }

    public function show($id)
    {
        $pengaduan = Pengaduan::findOrFail($id);
        return view('admin.pengaduan.detail', compact('pengaduan'));
    }

    public function updateStatus(Request $request, Pengaduan $pengaduan)
    {
        $request->validate([
            'status' => 'required|in:menunggu,verifikasi,rekomendasi,tindak_lanjut,selesai'
        ]);

        $pengaduan->update(['status' => $request->status]);

        return back()->with('success', 'Status berhasil diupdate!');
    }

    public function destroy(Pengaduan $pengaduan)
    {
        // Hapus file lampiran jika ada
        if ($pengaduan->lampiran) {
            foreach (json_decode($pengaduan->lampiran) as $file) {
                $path = public_path('storage/' . $file);
                if (file_exists($path)) unlink($path);
            }
        }

        $pengaduan->delete();

        return redirect()->route('admin.pengaduan.index')
            ->with('deleted', 'Pengaduan berhasil dihapus permanen!');
    }
}