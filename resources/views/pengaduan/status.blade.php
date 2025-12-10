@extends('layouts.app')
@section('title', 'Status Pengaduan #'.$data->id)

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-lg border-0">
                <div class="card-header text-white text-center" style="background:#B33D26;">
                    <h4>STATUS PENGADUAN #{{ $data->id }}</h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <tr><th width="30%">Nama</th><td>{{ $data->nama }}</td></tr>
                        <tr><th>NIK</th><td>{{ $data->nik }}</td></tr>
                        <tr><th>Email</th><td>{{ $data->email }}</td></tr>
                        <tr><th>No. HP</th><td>{{ $data->no_hp }}</td></tr>
                        <tr><th>Alamat</th><td>{{ $data->alamat }}</td></tr>
                        <tr><th>Subjek</th><td>{{ $data->subjek_pengaduan }}</td></tr>
                        <tr><th>Isi</th><td>{{ nl2br(e($data->isi_pengaduan)) }}</td></tr>
                        <tr>
                            <th>Status</th>
                            <td>
                                @switch($data->status)
                                    @case('menunggu')     <span class="badge bg-secondary">Menunggu</span> @break
                                    @case('verifikasi')   <span class="badge bg-info">Verifikasi</span> @break
                                    @case('rekomendasi')  <span class="badge bg-primary">Rekomendasi</span> @break
                                    @case('tindak_lanjut')<span class="badge bg-warning text-dark">Tindak Lanjut</span> @break
                                    @case('selesai')      <span class="badge bg-success">Selesai</span> @break
                                @endswitch
                            </td>
                        </tr>
                        <tr><th>Tanggal</th><td>{{ $data->created_at->format('d M Y H:i') }}</td></tr>
                    </table>

                    @if($data->lampiran)
                        <h5>Lampiran:</h5>
                        @foreach($data->lampiran as $file)
                            <a href="{{ Storage::url($file) }}" target="_blank" class="btn btn-sm btn-outline-primary me-2">
                                File {{ $loop->iteration }}
                            </a>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection