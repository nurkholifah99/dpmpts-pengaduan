@extends('layouts.app')

@section('title', 'Cek Status Pengaduan')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="text-center mb-5">
                <h2 class="fw-bold text-dark">Cek Status Pengaduan</h2>
                <p class="text-muted">Masukkan NIK, Nama, atau No. HP Anda</p>
            </div>

            <!-- Form Pencarian -->
            <form action="{{ route('tracking.index') }}" method="GET" class="mb-5">
                <div class="input-group input-group-lg shadow-sm">
                    <input type="text" name="search" class="form-control" 
                           placeholder="Contoh: 3209012345678901 atau Ahmad" 
                           value="{{ request('search') }}" required autofocus>
                    <button class="btn bg-custom text-white px-5" type="submit">
                        <i class="fas fa-search"></i> Cari
                    </button>
                </div>
            </form>

            @if(request('search'))
                @if($pengaduan->count() > 0)
                    <div class="row g-4">
                        @foreach($pengaduan as $item)
                        <div class="col-md-6">
                            <div class="card border-0 shadow h-100 hover-shadow">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-start mb-3">
                                        <h5 class="card-title mb-0">#{{ $item->id }}</h5>
                                        <span class="badge {{ 
                                            $item->status == 'selesai' ? 'bg-success' : 
                                            ($item->status == 'menunggu' ? 'bg-secondary' : 
                                            ($item->status == 'tindak_lanjut' ? 'bg-warning text-dark' : 'bg-info'))
                                        }} fs-6">
                                            {{ ucwords(str_replace('_', ' ', $item->status)) }}
                                        </span>
                                    </div>
                                    <p class="text-muted small mb-2">
                                        <i class="fas fa-user"></i> {{ $item->nama }}
                                    </p>
                                    <p class="text-muted small mb-3">
                                        <i class="fas fa-calendar"></i> {{ $item->created_at->format('d M Y H:i') }}
                                    </p>
                                    <p><strong>Subjek:</strong> {{ Str::limit($item->subjek_pengaduan, 60) }}</p>

                                    <div class="mt-3">
                                        <a href="{{ route('pengaduan.status', $item->id) }}" 
                                           class="btn btn-outline-primary btn-sm">
                                            <i class="fas fa-eye"></i> Lihat Detail
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                @else
                    <div class="text-center py-5">
                        <i class="fas fa-search fa-4x text-muted mb-4"></i>
                        <h5 class="text-muted">Pengaduan tidak ditemukan</h5>
                        <p class="text-muted">Coba periksa kembali NIK, Nama, atau No. HP yang Anda masukkan.</p>
                    </div>
                @endif
            @else
                <div class="text-center py-5">
                    <i class="fas fa-file-alt fa-5x text-primary mb-4"></i>
                    <h4 class="text-muted">Silakan masukkan NIK atau Nama untuk melacak pengaduan Anda</h4>
                </div>
            @endif
        </div>
    </div>
</div>

<style>
.hover-shadow:hover { transform: translateY(-5px); transition: all 0.3s; box-shadow: 0 10px 20px rgba(0,0,0,0.1)!important; }
</style>
@endsection