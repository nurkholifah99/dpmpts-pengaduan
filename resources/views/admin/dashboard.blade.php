@extends('layouts.app')

@section('title', 'Dashboard Admin - DPMPTSP Cirebon')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold text-dark">Dashboard Admin</h2>
        <form action="{{ route('admin.logout') }}" method="POST" class="d-inline">
            @csrf
            <button class="btn btn-outline-danger btn-sm"><i class="fas fa-sign-out-alt"></i> Logout</button>
        </form>
    </div>

    <div class="row g-4">
        <div class="col-md-4">
            <div class="card border-0 shadow-sm text-white" style="background: linear-gradient(135deg, #074685, #0a58ca);">
                <div class="card-body text-center py-5">
                    <h1 class="display-4 fw-bold">{{ \App\Models\Pengaduan::count() }}</h1>
                    <p class="fs-5 mb-0">Total Pengaduan</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border-0 shadow-sm text-white" style="background: linear-gradient(135deg, #ffc107, #ffa000);">
                <div class="card-body text-center py-5">
                    <h1 class="display-4 fw-bold">{{ \App\Models\Pengaduan::where('status', 'menunggu')->count() }}</h1>
                    <p class="fs-5 mb-0">Menunggu</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border-0 shadow-sm text-white" style="background: linear-gradient(135deg, #28a745, #20c997);">
                <div class="card-body text-center py-5">
                    <h1 class="display-4 fw-bold">{{ \App\Models\Pengaduan::where('status', 'selesai')->count() }}</h1>
                    <p class="fs-5 mb-0">Selesai</p>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-5 text-center">
        <a href="{{ route('admin.pengaduan.index') }}" class="btn bg-custom text-white btn-lg px-5">
            <i class="fas fa-list-ul me-2"></i> Kelola Pengaduan
        </a>
    </div>
</div>
@endsection