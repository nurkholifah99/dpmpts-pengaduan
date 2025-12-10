{{-- resources/views/pengaduan/form.blade.php --}}
@extends('layouts.app')
@section('title', 'Buat Pengaduan')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-9">
            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-body p-5">
                    <h2 class="text-center mb-4 text-danger fw-bold">PENGADUAN MASYARAKAT</h2>
                    <p class="text-center text-muted mb-5">DPMPTSP Kabupaten/Kota Cirebon</p>

                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    @if($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show">
                            <ul class="mb-0">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    <form action="{{ route('pengaduan.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row g-3">
                            <div class="col-md-6">
                                <input type="text" name="nama" class="form-control" placeholder="Nama Lengkap" value="{{ old('nama') }}" required>
                            </div>
                            <div class="col-md-6">
                                <input type="text" name="nik" class="form-control" placeholder="NIK (16 digit)" maxlength="16" value="{{ old('nik') }}" required>
                            </div>
                            <div class="col-md-6">
                                <input type="email" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}" required>
                            </div>
                            <div class="col-md-6">
                                <input type="text" name="no_hp" class="form-control" placeholder="No. HP / WhatsApp" value="{{ old('no_hp') }}" required>
                            </div>
                            <div class="col-12">
                                <textarea name="alamat" class="form-control" rows="3" placeholder="Alamat Lengkap" required>{{ old('alamat') }}</textarea>
                            </div>
                            <div class="col-12">
                                <input type="text" name="subjek_pengaduan" class="form-control" placeholder="Subjek Pengaduan" value="{{ old('subjek_pengaduan') }}" required>
                            </div>
                            <div class="col-12">
                                <textarea name="isi_pengaduan" class="form-control" rows="6" placeholder="Jelaskan pengaduan Anda secara detail..." required>{{ old('isi_pengaduan') }}</textarea>
                            </div>
                            <div class="col-12">
                                <label class="form-label fw-bold text-danger">Lampiran (maks 5 file, JPG/PNG/PDF)</label>
                                <input type="file" name="lampiran[]" class="form-control" multiple accept=".jpg,.jpeg,.png,.pdf">
                                <small class="text-muted">Maksimal 5MB per file</small>
                            </div>

                            <div class="col-12 mt-4">
                                {{-- PAKAI STYLE LANGSUNG BIAR NGGAK ILANG LAGI --}}
                                <button type="submit" 
                                        class="btn btn-lg w-100 text-white fw-bold"
                                        style="background: #B33D26; border: none;">
                                    KIRIM PENGADUAN
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection