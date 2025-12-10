@extends('layouts.app')

@section('title', 'Data Pengaduan')

@section('content')
<div class="card shadow-sm">
    <div class="card-header bg-primary text-white fw-bold">
        Data Pengaduan Masyarakat
    </div>

    <div class="card-body">
        <a href="/pengaduan/create" class="btn btn-success mb-3">+ Tambah Pengaduan</a>

        <table class="table table-bordered table-striped">
            <thead class="table-primary">
                <tr>
                    <th width="5%">No</th>
                    <th>Nama Pelapor</th>
                    <th>Judul</th>
                    <th>Tanggal</th>
                    <th width="20%">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($pengaduans as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->judul }}</td>
                        <td>{{ $item->created_at->format('d-m-Y') }}</td>
                        <td>
                            <a href="/pengaduan/{{ $item->id }}" class="btn btn-info btn-sm">Detail</a>
                            <a href="/pengaduan/{{ $item->id }}/edit" class="btn btn-warning btn-sm">Edit</a>
                            <form action="/pengaduan/{{ $item->id }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('Yakin hapus?')" class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center text-muted">Belum ada data pengaduan</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
