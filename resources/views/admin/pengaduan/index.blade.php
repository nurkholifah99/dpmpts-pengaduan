@extends('layouts.app')
@section('title', 'List Pengaduan Admin')

@section('content')
<div class="container py-5">
    <h1 class="text-center mb-5 text-white fw-bold text-shadow">LIST PENGADUAN</h1>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if(session('deleted'))
        <div class="alert alert-danger alert-dismissible fade show">
            {{ session('deleted') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    {{-- TABEL PENGADUAN --}}
    <div class="card shadow border-0">
        <div class="card-header text-white fw-bold" style="background:#B33D26;">
            Data Pengaduan
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-dark">
                        <tr>
                            <th width="5%">No</th>
                            <th>Nama</th>
                            <th>Subjek</th>
                            <th width="18%">Status</th>
                            <th width="12%">Tanggal</th>
                            <th width="18%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($pengaduan as $p)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td class="fw-semibold">{{ $p->nama }}</td>
                            <td>{{ Str::limit($p->subjek_pengaduan, 35) }}</td>
                            <td>
                                <form action="{{ route('PengaduanAdminController.updateStatus', $p) }}" method="POST" class="d-inline">
                                    @csrf @method('PUT')
                                    <select name="status" class="form-select form-select-sm" onchange="this.form.submit()">
                                        @foreach(['menunggu','verifikasi','rekomendasi','tindak_lanjut','selesai'] as $s)
                                            <option value="{{ $s }}" {{ $p->status == $s ? 'selected' : '' }}>
                                                {{ ucwords(str_replace('_', ' ', $s)) }}
                                            </option>
                                        @endforeach
                                    </select>
                                </form>
                            </td>
                            <td>{{ $p->created_at->format('d/m/Y') }}</td>
                            <td class="text-center">
                                <a href="{{ route('admin.pengaduan.detail', $p->id) }}" 
                                   class="btn btn-sm btn-info text-white me-1" title="Detail">
                                    Detail
                                </a>

                                {{-- Tombol Hapus dengan SweetAlert --}}
                                <button type="button" 
                                        class="btn btn-sm btn-danger" 
                                        onclick="confirmDelete({{ $p->id }})"
                                        title="Hapus Pengaduan">
                                    Hapus
                                </button>

                                {{-- Form Hapus (hidden) --}}
                                <form id="delete-form-{{ $p->id }}" 
                                      action="{{ route('pengaduan.destroy', $p->id) }}" 
                                      method="POST" 
                                      style="display:none;">
                                    @csrf 
                                    @method('DELETE')
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center py-5 text-muted">
                                Belum ada pengaduan
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- Pagination --}}
    <div class="d-flex justify-content-center mt-4">
        {{ $pengaduan->links() }}
    </div>
</div>

{{-- SweetAlert2 CDN --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    function confirmDelete(id) {
        Swal.fire({
            title: 'Yakin ingin menghapus pengaduan ini?',
            text: "Data akan dihapus permanen dan tidak dapat dikembalikan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#dc3545',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Ya, Hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('delete-form-' + id).submit();
            }
        });
    }
</script>
@endsection