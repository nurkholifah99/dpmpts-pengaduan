@extends('layouts.app')

@section('title', 'Daftar Pengaduan - Admin')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">Daftar Pengaduan</h2>
        <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card border-0 shadow">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead class="table-dark">
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Subjek</th>
                            <th>Status</th>
                            <th>Tanggal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($pengaduan as $i => $p)
                        <tr>
                            <td>{{ $pengaduan->firstItem() + $i }}</td>
                            <td>{{ $p->nama }}</td>
                            <td>{{ Str::limit($p->subjek_pengaduan, 50) }}</td>
                            <td>
                                <span class="badge {{ $p->status == 'selesai' ? 'bg-success' : ($p->status == 'menunggu' ? 'bg-warning' : 'bg-info') }}">
                                    {{ ucfirst(str_replace('_', ' ', $p->status)) }}
                                </span>
                            </td>
                            <td>{{ $p->created_at->format('d/m/Y H:i') }}</td>
                            <td>
                                <a href="{{ route('admin.pengaduan.show', $p) }}" class="btn btn-sm btn-primary"><i class="fas fa-eye"></i></a>
                                <form action="{{ route('admin.pengaduan.destroy', $p) }}" method="POST" class="d-inline">
                                    @csrf @method('DELETE')
                                    <button type="submit" onclick="return confirm('Yakin hapus?')" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr><td colspan="6" class="text-center py-5 text-muted">Belum ada pengaduan</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="card-footer bg-white">
                {{ $pengaduan->links() }}
            </div>
        </div>
    </div>
</div>
@endsection