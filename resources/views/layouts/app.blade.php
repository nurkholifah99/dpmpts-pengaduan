<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'DPMPTSP Kabupaten Cirebon')</title>

    <!-- Bootstrap 5.3.3 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome 6 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>
        body {
            background: #f8f9fa;
            font-family: 'Segoe UI', sans-serif;
        }

        .bg-custom {
            background-color: #074685 !important;
        }

        .bg-blur {
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            background-color: rgba(255, 255, 255, 0.3);
            /* biar efek blur keliatan */
        }

        /* Efek hover semua ikon sosial media */
        .social-brand {
            width: 48px;
            height: 48px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            font-size: 1.4rem;
            transition: all 0.3s ease;
            position: relative;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }

        .social-brand:hover {
            transform: translateY(-8px) scale(1.15);
            box-shadow: 0 15px 25px rgba(0, 0, 0, 0.3);
        }

        /* Pulse khusus WhatsApp biar paling menonjol */
        .wa-pulse {
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0% {
                box-shadow: 0 0 0 0 rgba(37, 211, 102, 0.7);
            }

            70% {
                box-shadow: 0 0 0 12px rgba(37, 211, 102, 0);
            }

            100% {
                box-shadow: 0 0 0 0 rgba(37, 211, 102, 0);
            }
        }
    </style>
</head>

<body class="d-flex flex-column min-vh-100">

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top shadow-sm">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center fw-bold" href="{{ route('dashboard') }}">
                <img src="{{ asset('images/logo-dpmptsp.png') }}" alt="Logo" width="40" height="40"
                    class="me-2 rounded">
                DPMPTSP Cirebon
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto fw-semibold">
                    <li class="nav-item"><a class="nav-link {{ request()->is('/') ? 'active' : '' }}"
                            href="{{ route('dashboard') }}">Home</a></li>
                    <li class="nav-item"><a class="nav-link {{ request()->is('pengaduan*') ? 'active' : '' }}"
                            href="{{ route('pengaduan.create') }}">Buat Pengaduan</a></li>
                    <li class="nav-item"><a class="nav-link {{ request()->is('tracking*') ? 'active' : '' }}"
                            href="{{ route('tracking.index') }}">Cek Status</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- CONTENT -->
    <main class="flex-fill py-5">
        @yield('content')
    </main>

    <!-- FOOTER DENGAN SOSIAL MEDIA WARNA-WARNI -->
    <footer class="bg-custom text-white py-5">
        <div class="container">
            <div class="row gy-5 text-center text-lg-start">

                <!-- Alamat -->
                <div class="col-lg-4">
                    <h5 class="fw-bold mb-3 text-white">DPMPTSP Kabupaten Cirebon</h5>
                    <p class="small mb-0">
                        Jl. Sunan Drajat No.20, Sumber<br>
                        Kec. Sumber, Kabupaten Cirebon<br>
                        Jawa Barat 45611
                    </p>
                </div>

                <!-- Kontak -->
                <div class="col-lg-3">
                    <h5 class="fw-bold mb-3 text-white">Kontak Kami</h5>
                    <p class="mb-1"><i class="fas fa-phone-alt me-2"></i> (0231) 323631</p>
                    <p class="mb-0"><i class="fas fa-envelope me-2"></i> dpmptsp@cirebonkab.go.id</p>
                </div>

                <!-- SOSIAL MEDIA WARNA BRAND ASLI -->
                <div class="col-lg-5 text-center text-lg-end">
                    <h5 class="fw-bold mb-4 text-white">Sosial Media</h5>
                    <div class="d-inline-flex gap-3 text-decoration-none">

                        <!-- Facebook - Biru -->
                        <a href="https://web.facebook.com/profile.php?id=61563456908775" target="_blank"
                            class="social-brand text-white text-decoration-none" style="background:#1877F2;">
                            <i class="fab fa-facebook-f "></i>
                        </a>

                        <!-- Instagram - Gradient -->
                        <a href="https://www.instagram.com/dpmptsp.kab.crb/" target="_blank"
                            class="social-brand text-white text-decoration-none"
                            style="background:linear-gradient(45deg,#f09433,#e6683c,#dc2743,#cc2366,#bc1888);">
                            <i class="fab fa-instagram"></i>
                        </a>

                        <!-- TikTok - Hitam + Merah -->
                        <a href="https://www.tiktok.com/@dpmptsp_kabcirebon" target="_blank"
                            class="social-brand text-white text-decoration-none" style="background:#000;">
                            <i class="fab fa-tiktok"></i>
                        </a>

                        <!-- YouTube - Merah -->
                        <a href="https://www.youtube.com/@dpmptspcirebonkab9493/videos" target="_blank"
                            class="social-brand text-white text-decoration-none" style="background:#FF0000;">
                            <i class="fab fa-youtube"></i>
                        </a>

                        <!-- WhatsApp - Hijau + Pulse -->
                        <a href="https://api.whatsapp.com/send/?phone=6282295345509&text=Halo%20Admin%20DPMPTSP%20Cirebon,%20saya%20mau%20bertanya%20tentang%20pengaduan..."
                            target="_blank" class="social-brand text-white text-decoration-none"
                            style="background:#25D366;">
                            <i class="fab fa-whatsapp"></i>
                        </a>

                    </div>
                </div>
            </div>

            <hr class="my-4 bg-white opacity-25">
            <div class="text-center small">
                © {{ date('Y') }} DPMPTSP Kabupaten Cirebon — Sistem Pengaduan Masyarakat v1.0
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>