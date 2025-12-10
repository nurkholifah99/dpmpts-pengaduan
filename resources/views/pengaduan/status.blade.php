@extends('layouts.app')

@section('title', 'Status Pengaduan #'.$pengaduan->id)

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-9">
            <div class="card shadow border-0">
                <div class="card-header text-white text-center py-4" style="background: linear-gradient(135deg, #074685, #0a58ca);">
                    <h3 class="mb-0">STATUS PENGADUAN #{{ $pengaduan->id }}</h3>
                </div>
                <div class="card-body p-5">
                    <div class="row g-4">
                        <div class="col-md-6"><strong>Nama Lengkap</strong><p class="mt-1 fs-5">{{ $pengaduan->nama }}</p></div>
                        <div class="col-md-6"><strong>NIK</strong><p class="mt-1 fs-5">{{ $pengaduan->nik }}</p></div>
                        <div class="col-md-6"><strong>Email</strong><p class="mt-1">{{ $pengaduan->email }}</p></div>
                        <div class="col-md-6"><strong>No. HP</strong><p class="mt-1">{{ $pengaduan->no_hp }}</p></div>
                        <div class="col-12"><strong>Alamat</strong><p class="mt-1">{{ $pengaduan->alamat }}</p></div>
                        <div class="col-12"><strong>Subjek Pengaduan</strong><h5 class="mt-2 text-primary">{{ $pengaduan->subjek_pengaduan }}</h5></div>
                        <div class="col-12">
                            <strong>Isi Pengaduan</strong>
                            <div class="bg-light p-4 rounded mt-2 border">{{ nl2br(e($pengaduan->isi_pengaduan)) }}</div>
                        </div>

                        <div class="col-md-6">
                            <strong>Status Saat Ini</strong>
                            <div class="mt-2">
                                @switch($pengaduan->status)
                                    @case('menunggu')     <span class="badge bg-secondary fs-5 px-4 py-2">Menunggu</span> @break
                                    @case('verifikasi')   <span class="badge bg-info fs-5 px-4 py-2">Sedang Diverifikasi</span> @break
                                    @case('rekomendasi')  <span class="badge bg-primary fs-5 px-4 py-2">Rekomendasi</span> @break
                                    @case('tindak_lanjut')<span class="badge bg-warning text-dark fs-5 px-4 py-2">Tindak Lanjut</span> @break
                                    @case('selesai')      <span class="badge bg-success fs-5 px-4 py-2">Selesai</span> @break
                                @endswitch
                            </div>
                        </div>
                        <div class="col-md-6 text-md-end">
                            <strong>Diajukan Pada</strong>
                            <p class="mt-1 fs-5">{{ $pengaduan->created_at->format('d F Y, H:i') }}</p>
                        </div>

                        @if($pengaduan->lampiran && count($pengaduan->lampiran) > 0)
                        <div class="col-12 mt-4">
                            <strong>Lampiran ({{ count($pengaduan->lampiran) }} file)</strong><br>
                            <div class="mt-3">
                                @foreach($pengaduan->lampiran as $file)
                                <a href="{{ asset('storage/'.$file) }}" target="_blank" 
                                   class="btn btn-outline-primary btn-sm me-2 mb-2">
                                    <i class="fas fa-paperclip"></i> File {{ $loop->iteration }}
                                </a>
                                @endforeach
                            </div>
                        </div>
                        @endif
                    </div>

                    <div class="text-center mt-5">
                        <a href="{{ route('tracking.index') }}" class="btn btn-secondary btn-lg">
                            Kembali ke Pencarian
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection