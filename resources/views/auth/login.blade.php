@extends('layouts.app')

@section('title', 'Login Admin - DPMPTSP Cirebon')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">
            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-body p-5">
                    <div class="text-center mb-4">
                        <img src="{{ asset('images/logo-dpmptsp.png') }}" alt="Logo" width="80" class="mb-3">
                        <h4 class="fw-bold">Login Admin</h4>
                        <p class="text-muted">Sistem Pengaduan Masyarakat</p>
                    </div>

                    @if($errors->any())
                        <div class="alert alert-danger">{{ $errors->first() }}</div>
                    @endif

                    <form method="POST" action="{{ route('admin.login') }}">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Email</label>
                            <input type="email" name="email" class="form-control form-control-lg" required autofocus>
                        </div>
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Password</label>
                            <input type="password" name="password" class="form-control form-control-lg" required>
                        </div>
                        <button type="submit" class="btn bg-custom text-white btn-lg w-100">
                            <i class="fas fa-sign-in-alt me-2"></i> Masuk
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection