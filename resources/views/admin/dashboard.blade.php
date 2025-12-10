@extends('layouts.app')
@section('title', 'Dashboard Admin')

@section('content')
<div class="container py-5">
    <h1 class="text-center mb-5 text-white fw-bold text-shadow">DASHBOARD ADMIN</h1>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    {{-- CARD RINGKASAN STATISTIK --}}
    <div class="row text-white text-center mb-5 g-4">
        <div class="col-md-2 col-6">
            <div class="bg-white text-dark p-4 rounded shadow-lg">
                <h5 class="mb-0">Total Pengaduan</h5>
                <h3 class="mb-0">{{ $total }}</h3>
            </div>
        </div>
        <div class="col-md-2 col-6">
            <div class="bg-secondary text-white p-4 rounded shadow-lg">
                <h5 class="mb-0">Menunggu</h5>
                <h3 class="mb-0">{{ $menunggu }}</h3>
            </div>
        </div>
        <div class="col-md-2 col-6">
            <div class="bg-info text-white p-4 rounded shadow-lg">
                <h5 class="mb-0">Verifikasi</h5>
                <h3 class="mb-0">{{ $verifikasi }}</h3>
            </div>
        </div>
        <div class="col-md-2 col-6">
            <div class="bg-primary text-white p-4 rounded shadow-lg">
                <h5 class="mb-0">Rekomendasi</h5>
                <h3 class="mb-0">{{ $rekomendasi }}</h3>
            </div>
        </div>
        <div class="col-md-2 col-6">
            <div class="bg-warning text-dark p-4 rounded shadow-lg">
                <h5 class="mb-0">Tindak Lanjut</h5>
                <h3 class="mb-0">{{ $tindak_lanjut }}</h3>
            </div>
        </div>
        <div class="col-md-2 col-6">
            <div class="bg-success text-white p-4 rounded shadow-lg">
                <h5 class="mb-0">Selesai</h5>
                <h3 class="mb-0">{{ $selesai }}</h3>
            </div>
        </div>
    </div>

    {{-- Tambahan Statistik (misalnya, chart sederhana jika diperlukan, tapi untuk sekarang kosongkan atau tambah placeholder) --}}
    <div class="card shadow border-0 mb-5">
        <div class="card-header text-white fw-bold" style="background:#B33D26;">
            Statistik Pengaduan
        </div>
        <div class="card-body">
            {{-- Di sini bisa tambah chart menggunakan Chart.js atau library lain, tapi untuk sekarang placeholder --}}
            <p class="text-center text-muted">Grafik statistik pengaduan akan ditampilkan di sini (coming soon).</p>
        </div>
    </div>

    {{-- Link ke List Pengaduan --}}
    <div class="text-center">
        <a href="{{ route('admin.pengaduan.index') }}" class="btn btn-lg btn-primary">Lihat Semua Pengaduan</a>
    </div>
</div>
@endsection