@extends('layouts.app')

@section('title', 'Sistem Informasi Pengaduan Masyarakat - DPMPTSP Kab Cirebon')

@section('content')

<!-- JUMBOTRON HERO -->
<!-- <div class="jumbotron text-center py-5 mb-5" style="
        background: url('/images/bg-dpmptsp.jpg') center/cover no-repeat;
        color: white;
        padding: 120px 20px;
        position: relative;">

    <div style="background: rgba(0, 0, 0, 0.5); position: absolute; top: 0; left: 0; width: 100%; height: 100%;"></div>

    <div style="position: relative; z-index: 2;">
        <h1 class="display-5 fw-bold mb-2">DINAS PENANAMAN MODAL DAN<br>PELAYANAN TERPADU SATU PINTU</h1>
        <h4 class="mb-3">Kabupaten Cirebon</h4>
        <p class="lead">Memberikan kemudahan layanan perizinan dan pengaduan secara online.</p>
    </div>
</div> -->

<!-- PAPAN INFORMASI SLIDER – UKURAN & TAMPILAN 100% PAS -->
<div class="container my-2">
    <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
        <div id="infoSlider" class="carousel slide" data-bs-ride="carousel" data-bs-interval="6000">

            <!-- Titik di bawah -->
            <div class="carousel-indicators mb-0">
                <button type="button" data-bs-target="#infoSlider" data-bs-slide-to="0" class="active"></button>
                <button type="button" data-bs-target="#infoSlider" data-bs-slide-to="1"></button>
                <button type="button" data-bs-target="#infoSlider" data-bs-slide-to="2"></button>
                <button type="button" data-bs-target="#infoSlider" data-bs-slide-to="3"></button>
            </div>

            <div class="carousel-inner">
                <!-- Slide 1 – Tugas Pokok (gambar biru) -->
                <div class="carousel-item active">
                    <img src="/images/tupoksianjay.png" class="d-block w-100" alt="Tugas Pokok"
                        style="height: 480px; object-fit: cover;">
                    <div class="position-absolute bottom-0 start-0 mb-4 ms-4 d-none d-md-block">
                    </div>
                </div>

                <!-- Slide 3 -->
                <div class="carousel-item">
                    <img src="/images/visimisi.png" class="d-block w-100" alt="Pengaduan"
                        style="height: 480px; object-fit: cover;">
                    <div class="position-absolute bottom-0 start-0 mb-4 ms-4 d-none d-md-block">
                    </div>
                </div>

                <!-- Slide 2: VIDEO YOUTUBE – KLIK LANGSUNG BUKA VIDEO -->
                <div class="carousel-item">
                    <a href="https://youtu.be/nQ2uN8J_QIs" target="_blank">
                        <div class="position-relative">
                            <!-- Thumbnail video (1080×460 px) -->
                            <img src="/images/image.png" class="d-block w-100" alt="Video DPMPTSP Cirebon"
                                style="height: 460px; object-fit: cover;">

                            <!-- Icon Play merah besar di tengah -->
                            <div class="position-absolute top-50 start-50 translate-middle">
                                <div class="bg-danger rounded-circle p-4 shadow-lg">
                                    <i class="fas fa-play fa-4x text-white"></i>
                                </div>
                            </div>

                            <!-- Judul video di pojok kiri bawah (opsional, kalau mau) -->
                            <div class="position-absolute bottom-0 start-0 mb-4 ms-4 d-none d-md-block">
                                <div class="bg-black bg-opacity-75 text-white p-3 rounded-3">
                                    <small class="fw-bold">Video Resmi DPMPTSP Kab. Cirebon</small>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>


            </div>

            <!-- Panah -->
            <button class="carousel-control-prev" type="button" data-bs-target="#infoSlider" data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#infoSlider" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
            </button>
        </div>
    </div>
</div>

<!-- JENIS LAYANAN -->
<div class="container mb-5">
    <h2 class="mb-5 text-center fw-bold">Layanan Perizinan & Pengaduan</h2>
    <div class="row text-center g-4 justify-content-center">

        <!-- Perizinan Online -->
        <div class="col-md-4 col-11">
            <a href="https://digiprom.cirebonkab.go.id/" class="text-decoration-none">
                <div class="card h-100 shadow-sm border-0 overflow-hidden"
                    style="border-radius: 18px; min-height: 180px;">
                    <div class="row g-0 h-100">
                        <div class="col-5">
                            <img src="/images/perizinan.png" class="img-fluid w-100 h-100" style="object-fit: cover;"
                                alt="Perizinan Online">
                        </div>
                        <div class="col-7 bg-custom d-flex align-items-center justify-content-center">
                            <h5 class="text-white fw-bold mb-0 px-3 text-center">Perizinan<br>Online</h5>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <!-- OSS -->
        <div class="col-md-4 col-11">
            <a href="https://oss.go.id/id" class="text-decoration-none">
                <div class="card h-100 shadow-sm border-0 overflow-hidden"
                    style="border-radius: 18px; min-height: 180px;">
                    <div class="row g-0 h-100">
                        <div class="col-5">
                            <img src="/images/oss.png" class="img-fluid w-100 h-100" style="object-fit: cover;"
                                alt="OSS">
                        </div>
                        <div class="col-7 bg-custom d-flex align-items-center justify-content-center">
                            <h5 class="text-white fw-bold mb-0 px-3 text-center">OSS<br>(Online Single Submission)</h5>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <!-- Pengaduan Masyarakat -->
        <div class="col-md-4 col-11">
            <a href="{{ route('pengaduan.create') }}" class="text-decoration-none">
                <div class="card h-100 shadow-sm border-0 overflow-hidden"
                    style="border-radius: 18px; min-height: 180px;">
                    <div class="row g-0 h-100">
                        <div class="col-5">
                            <img src="/images/pengaduan.png" class="img-fluid w-100 h-100" style="object-fit: cover;"
                                alt="Pengaduan Masyarakat">
                        </div>
                        <div class="col-7 bg-custom d-flex align-items-center justify-content-center">
                            <h5 class="text-white fw-bold mb-0 px-3 text-center">Pengaduan<br>Masyarakat</h5>
                        </div>
                    </div>
                </div>
            </a>
        </div>

    </div>
</div>

<!-- BERITA TERBARU – VERSI MINIMALIS & ELEGAN -->
<div class="container my-5">
    <h3 class="text-center fw-bold mb-5 text-dark">Berita & Pengumuman Terbaru</h3>
    <div class="row g-4 justify-content-center">

        <!-- Berita 1 -->
        <div class="col-lg-4 col-md-6">
            <a href="https://dpmptsp.cirebonkab.go.id/v2/bp-rebana-sebut-komoditas-garam-bisa-dorong-investasi-baru-di-cirebon"
                target="_blank" class="text-decoration-none text-dark">
                <div class="border rounded-3 p-4 shadow-sm bg-white h-100 hover-shadow">
                    <h6 class="fw-semibold mb-2 line-clamp-3">
                        BP Rebana Sebut Komoditas Garam Bisa Dorong Investasi Baru di Cirebon
                    </h6>
                    <small class="text-primary fw-medium">Baca selengkapnya →</small>
                </div>
            </a>
        </div>

        <!-- Berita 2 -->
        <div class="col-lg-4 col-md-6">
            <a href="https://dpmptsp.cirebonkab.go.id/v2/selamat-dan-sukses-dilantiknya-bupati-cirebon" target="_blank"
                class="text-decoration-none text-dark">
                <div class="border rounded-3 p-4 shadow-sm bg-white h-100 hover-shadow">
                    <h6 class="fw-semibold mb-2 line-clamp-3">
                        Selamat dan Sukses Dilantiknya Bupati Cirebon
                    </h6>
                    <small class="text-primary fw-medium">Baca selengkapnya →</small>
                </div>
            </a>
        </div>

        <!-- Berita 3 -->
        <div class="col-lg-4 col-md-6">
            <a href="https://dpmptsp.cirebonkab.go.id/v2/yuk-ke-mpp-sudah-bisa-cetak-ktp-dan-kia-lohhhhhhh"
                target="_blank" class="text-decoration-none text-dark">
                <div class="border rounded-3 p-4 shadow-sm bg-white h-100 hover-shadow">
                    <h6 class="fw-semibold mb-2 line-clamp-3">
                        Yuk ke MPP! Sudah Bisa Cetak KTP dan KIA Lohhh
                    </h6>
                    <small class="text-primary fw-medium">Baca selengkapnya →</small>
                </div>
            </a>
        </div>
        <!-- 4 (BARU) -->
        <div class="col-lg-4 col-md-6">
            <a href="https://dpmptsp.cirebonkab.go.id/v2/aplikasi-peta-potensi" target="_blank"
                class="text-decoration-none text-dark">
                <div class="border rounded-3 p-4 shadow-sm bg-white h-100 hover-shadow">
                    <h6 class="fw-semibold mb-2 line-clamp-3">
                        Aplikasi Peta Potensi Investasi Kabupaten Cirebon
                    </h6>
                    <small class="text-primary fw-medium">Lihat peta potensi →</small>
                </div>
            </a>
        </div>

        <!-- 5 (BARU) -->
        <div class="col-lg-4 col-md-6">
            <a href="https://dpmptsp.cirebonkab.go.id/v2/laporan-kinerja-instansi-pemerintah-2024-dinas-penanaman-modal-dan-pelayanan-terpadu-satu-pintu-kabupaten-cirebon"
                target="_blank" class="text-decoration-none text-dark">
                <div class="border rounded-3 p-4 shadow-sm bg-white h-100 hover-shadow">
                    <h6 class="fw-semibold mb-2 line-clamp-3">
                        Laporan Kinerja Instansi Pemerintah (LKIP) 2024
                    </h6>
                    <small class="text-primary fw-medium">Unduh laporan →</small>
                </div>
            </a>
        </div>

        <!-- 6 (BARU) -->
        <div class="col-lg-4 col-md-6">
            <a href="https://dpmptsp.cirebonkab.go.id/v2/penghargaan-kepada-perusahaan-pma-pmdn-terbaik-dalam-pelaporan-lkpm-2024"
                target="_blank" class="text-decoration-none text-dark">
                <div class="border rounded-3 p-4 shadow-sm bg-white h-100 hover-shadow">
                    <h6 class="fw-semibold mb-2 line-clamp-3">
                        Penghargaan Perusahaan PMA/PMDN Terbaik Pelaporan LKPM 2024
                    </h6>
                    <small class="text-primary fw-medium">Lihat penerima →</small>
                </div>
            </a>
        </div>
    </div>
</div>

<!-- CSS Minimalis & Elegan -->
<style>
    .hover-shadow {
        transition: all 0.3s ease;
    }

    .hover-shadow:hover {
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.12) !important;
        transform: translateY(-4px);
    }

    .line-clamp-3 {
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
</style>
<!-- VIDEO DARI YOUTUBE (4 VIDEO YANG KAMU KASIH) -->
<div class="container my-5">
    <h3 class="text-center fw-bold mb-4"> Video </h3>
    <div class="row">
        <div class="col-12">
            <div class="d-flex overflow-x-auto gap-4 pb-3" style="scrollbar-width: thin;">
                <!-- Video 1 -->
                <div class="flex-shrink-0" style="width: 320px;">
                    <div class="ratio ratio-16x9 rounded-3 shadow">
                        <iframe src="https://www.youtube.com/embed/iaVJr7egJkQ" title="Video 1" frameborder="0"
                            allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen></iframe>
                    </div>
                </div>
                <!-- Video 2 -->
                <div class="flex-shrink-0" style="width: 320px;">
                    <div class="ratio ratio-16x9 rounded-3 shadow">
                        <iframe src="https://www.youtube.com/embed/nQ2uN8J_QIs" title="Video 2" frameborder="0"
                            allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen></iframe>
                    </div>
                </div>
                <!-- Video 3 -->
                <div class="flex-shrink-0" style="width: 320px;">
                    <div class="ratio ratio-16x9 rounded-3 shadow">
                        <iframe src="https://www.youtube.com/embed/DYhrPntc9WI" title="Video 3" frameborder="0"
                            allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen></iframe>
                    </div>
                </div>
                <!-- Video 4 -->
                <div class="flex-shrink-0" style="width: 320px;">
                    <div class="ratio ratio-16x9 rounded-3 shadow">
                        <iframe src="https://www.youtube.com/embed/wbEG947PBoc" title="Video 4" frameborder="0"
                            allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection