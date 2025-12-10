@extends('layouts.app')
@section('title', 'Detail Pengaduan')

@section('content')
<div class="container py-5">
    <h1 class="text-center mb-5 text-white fw-bold text-shadow">DETAIL PENGADUAN</h1>

    <div class="card shadow border-0">
        <div class="card-header text-white fw-bold" style="background:#B33D26;">
            Informasi Pengaduan #{{ $pengaduan->id }}
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <h5 class="fw-bold">Nama Pengadu</h5>
                    <p>{{ $pengaduan->nama }}</p>

                    <h5 class="fw-bold">NIK</h5>
                    <p>{{ $pengaduan->nik }}</p>

                    <h5 class="fw-bold">Email</h5>
                    <p>{{ $pengaduan->email }}</p>

                    <h5 class="fw-bold">No. HP</h5>
                    <p>{{ $pengaduan->no_hp }}</p>

                    <h5 class="fw-bold">Alamat</h5>
                    <p>{{ $pengaduan->alamat }}</p>
                </div>
                <div class="col-md-6">
                    <h5 class="fw-bold">Subjek Pengaduan</h5>
                    <p>{{ $pengaduan->subjek_pengaduan }}</p>

                    <h5 class="fw-bold">Isi Pengaduan</h5>
                    <p>{{ $pengaduan->isi_pengaduan }}</p>

                    <h5 class="fw-bold">Status</h5>
                    <p class="badge bg-{{ $pengaduan->status == 'selesai' ? 'success' : ($pengaduan->status == 'menunggu' ? 'secondary' : 'primary') }}">
                        {{ ucwords(str_replace('_', ' ', $pengaduan->status)) }}
                    </p>

                    <h5 class="fw-bold">Tanggal Dibuat</h5>
                    <p>{{ $pengaduan->created_at->format('d/m/Y H:i') }}</p>

                    <h5 class="fw-bold">Lampiran</h5>
                    @if($pengaduan->lampiran && count(json_decode($pengaduan->lampiran)) > 0)
                        <ul>
                            @foreach(json_decode($pengaduan->lampiran) as $file)
                                <li><a href="{{ asset('storage/' . $file) }}" target="_blank">Lihat File</a></li>
                            @endforeach
                        </ul>
                    @else
                        <p>Tidak ada lampiran</p>
                    @endif
                </div>
            </div>

            <div class="mt-4 text-center">
                <a href="{{ route('admin.pengaduan.index') }}" class="btn btn-secondary">Kembali ke List</a>
                <button type="button" class="btn btn-danger" onclick="confirmDelete({{ $pengaduan->id }})">Hapus Pengaduan</button>

                {{-- Form Hapus (hidden) --}}
                <form id="delete-form-{{ $pengaduan->id }}" 
                      action="{{ route('pengaduan.destroy', $pengaduan->id) }}" 
                      method="POST" 
                      style="display:none;">
                    @csrf 
                    @method('DELETE')
                </form>
            </div>
        </div>
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