<?php
// app/Http/Controllers/Admin/PengaduanController.php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pengaduan;
use Illuminate\Http\Request;

class PengaduanController extends Controller
{
    public function index()
    {
        $pengaduan = Pengaduan::latest()->paginate(15);
        return view('admin.pengaduan.index', compact('pengaduan'));
    }

    public function show(Pengaduan $pengaduan)
    {
        return view('admin.pengaduan.detail', compact('pengaduan'));
    }

    public function updateStatus(Request $request, Pengaduan $pengaduan)
    {
        $request->validate([
            'status' => 'required|in:menunggu,verifikasi,rekomendasi,tindak_lanjut,selesai'
        ]);

        $pengaduan->update(['status' => $request->status]);
        return back()->with('success', 'Status berhasil diperbarui.');
    }

    public function destroy(Pengaduan $pengaduan)
    {
        $pengaduan->delete();
        return redirect()->route('admin.pengaduan.index')
            ->with('success', 'Pengaduan berhasil dihapus.');
    }
}