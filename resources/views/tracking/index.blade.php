@extends('layouts.app')

@section('title', 'Tracking Pengaduan')

@section('content')

<h1 class="mb-4">Cek Status Pengaduan Anda</h1>

{{-- Form input Nama --}}
<form action="{{ route('tracking.cek') }}" method="POST" class="mb-4">
    @csrf
    <div class="input-group" style="max-width: 450px;">
        <input type="text" name="nama" class="form-control" placeholder="Masukkan Nama Anda" required>
        <button type="submit" class="btn btn-primary">Cek Status</button>
    </div>
</form>

{{-- Jika pengaduan ditemukan --}}
@if(session('status'))
<div class="card shadow-sm p-4 mb-4" style="max-width: 700px;">
    <h5 class="mb-3 text-primary">🔎 Hasil Status Pengaduan</h5>

    <p><strong>Nama:</strong> {{ session('status')->nama }}</p>
    <p><strong>Telepon:</strong> {{ session('status')->telepon }}</p>
    <p><strong>Isi Pengaduan:</strong> {{ session('status')->isi_pengaduan }}</p>

    <p><strong>Status:</strong>
        @if(session('status')->status == 'menunggu')
            <span class="badge bg-warning text-dark">Menunggu</span>
        @elseif(session('status')->status == 'diproses')
            <span class="badge bg-primary">Diproses</span>
        @elseif(session('status')->status == 'selesai')
            <span class="badge bg-success">Selesai</span>
        @elseif(session('status')->status == 'ditolak')
            <span class="badge bg-danger">Ditolak</span>
        @endif
    </p>

    @if(session('status')->catatan_rekomendasi)
        <p><strong>Catatan Rekomendasi:</strong> {{ session('status')->catatan_rekomendasi }}</p>
    @endif

    <p><strong>Tanggal Pengajuan:</strong> {{ session('status')->created_at->format('d M Y H:i') }}</p>
</div>
@endif

{{-- Jika tidak ditemukan --}}
@if(session('error'))
<div class="alert alert-danger" style="max-width: 450px;">
    {{ session('error') }}
</div>
@endif

@endsection
