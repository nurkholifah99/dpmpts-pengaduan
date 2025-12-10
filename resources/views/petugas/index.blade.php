@extends('layouts.app')

@section('title', 'Dashboard Petugas')

@section('content')

<h1 class="mb-4">Dashboard Petugas</h1>

{{-- Table Pengaduan --}}
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Nama</th>
            <th>NIK</th>
            <th>Deskripsi</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $p)
        <tr data-status="{{ $p->status }}">
            <td>{{ $p->nama }}</td>
            <td>{{ $p->nik }}</td>
            <td>{{ $p->deskripsi }}</td>
            <td>{{ $p->status }}</td>
            <td>
                @if($p->status == 'menunggu')
                    <form action="{{ route('pengaduan.validasi', $p->id) }}" method="POST" class="d-inline">
                        @csrf
                        <input type="hidden" name="aksi" value="verifikasi">
                        <button class="btn btn-success btn-sm">Terima</button>
                    </form>

                    <form action="{{ route('pengaduan.validasi', $p->id) }}" method="POST" class="d-inline">
                        @csrf
                        <input type="hidden" name="aksi" value="tolak">
                        <button class="btn btn-danger btn-sm">Tolak</button>
                    </form>

                @elseif($p->status == 'rekomendasi')
                    <form action="{{ route('pengaduan.rekomendasi', $p->id) }}" method="POST" class="d-inline">
                        @csrf
                        <input type="text" name="catatan_rekomendasi" class="form-control mb-1" placeholder="Catatan rekomendasi">
                        <button class="btn btn-primary btn-sm">Simpan</button>
                    </form>

                @elseif($p->status == 'diproses')
                    <form action="{{ route('pengaduan.selesai', $p->id) }}" method="POST">
                        @csrf
                        <input type="text" name="tindak_lanjut" class="form-control mb-1" placeholder="Catatan tindak lanjut">
                        <button class="btn btn-primary btn-sm">Selesaikan</button>
                    </form>
                @else
                    -
                @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection
