<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use Illuminate\Http\Request;

class PetugasController extends Controller
{
    public function index()
    {
        $data = Pengaduan::orderBy('created_at', 'desc')->get();
        return view('petugas.index', compact('data'));
    }

    public function validasi($id, Request $request)
    {
        $status = $request->aksi == 'verifikasi' ? 'diproses' : 'ditolak';
        Pengaduan::where('id',$id)->update(['status'=>$status]);
        return back()->with('success','Status berhasil diperbarui');
    }

    public function selesai($id, Request $request)
    {
        Pengaduan::where('id',$id)->update([
            'status'=>'selesai',
            'tindak_lanjut'=>$request->tindak_lanjut
        ]);
        return back()->with('success','Pengaduan selesai ✔');
    }
}
