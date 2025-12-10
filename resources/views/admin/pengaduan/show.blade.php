@extends('layouts.app')

@section('title', 'Detail Pengaduan #{{ $pengaduan->id }}')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card border-0 shadow">
                <div class="card-header bg-custom text-white d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">Detail Pengaduan #{{ $pengaduan->id }}</h4>
                    <a href="{{ route('admin.pengaduan.index') }}" class="btn btn-light btn-sm"><i class="fas fa-arrow-left"></i> Kembali</a>
                </div>
                <div class="card-body">
                    <div class="row g-4">
                        <div class="col-md-6"><strong>Nama</strong><p class="mt-1">{{ $pengaduan->nama }}</p></div>
                        <div class="col-md-6"><strong>NIK</strong><p class="mt-1">{{ $pengaduan->nik }}</p></div>
                        <div class="col-md-6"><strong>Email</strong><p class="mt-1">{{ $pengaduan->email }}</p></div>
                        <div class="col-md-6"><strong>No HP</strong><p class="mt-1">{{ $pengaduan->no_hp }}</p></div>
                        <div class="col-12"><strong>Alamat</strong><p class="mt-1">{{ $pengaduan->alamat }}</p></div>
                        <div class="col-12"><strong>Subjek</strong><h5 class="mt-2">{{ $pengaduan->subjek_pengaduan }}</h5></div>
                        <div class="col-12"><strong>Isi Pengaduan</strong><div class="bg-light p-4 rounded mt-2">{{ nl2br(e($pengaduan->isi_pengaduan)) }}</div></div>

                        @if($pengaduan->lampiran)
                        <div class="col-12">
                            <strong>Lampiran</strong><br>
                            @foreach($pengaduan->lampiran as $file)
                                <a href="{{ asset('storage/'.$file) }}" target="_blank" class="btn btn-outline-primary btn-sm mt-2 me-2">
                                    <i class="fas fa-paperclip"></i> File {{ $loop->iteration }}
                                </a>
                            @endforeach
                        </div>
                        @endif

                        <div class="col-12 mt-4">
                            <form action="{{ route('admin.pengaduan.updateStatus', $pengaduan) }}" method="POST">
                                @csrf @method('PATCH')
                                <div class="row align-items-center">
                                    <div class="col-md-3"><strong>Ubah Status:</strong></div>
                                    <div class="col-md-6">
                                        <select name="status" class="form-select form-select-lg" onchange="this.form.submit()">
                                            @foreach(['menunggu','verifikasi','rekomendasi','tindak_lanjut','selesai'] as $s)
                                                <option value="{{ $s }}" {{ $pengaduan->status == $s ? 'selected' : '' }}>
                                                    {{ ucfirst(str_replace('_', ' ', $s)) }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection