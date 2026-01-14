<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - DPMPTSP Cirebon</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome untuk ikon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            height: 100vh;
            display: flex;
            align-items: center;
        }
        .bg-custom {
            background-color: #007bff; /* Ganti dengan warna utama DPMPTSP jika diketahui, misalnya biru */
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                <div class="card shadow-lg border-0 rounded-4">
                    <div class="card-body p-5">
                        <div class="text-center mb-4">
                            <img src="/images/logo-dpmptsp.png" alt="Logo DPMPTSP Cirebon" width="80" class="mb-3 rounded">
                            <h4 class="fw-bold">Login Admin</h4>
                            <p class="text-muted">Sistem Pengaduan Masyarakat</p>
                        </div>

                        <!-- Contoh pesan error, bisa dihapus atau disesuaikan -->
                        <!-- <div class="alert alert-danger">Pesan error di sini</div> -->

                        <form method="POST" action="{{ route('admin.login') }}"> <!-- Ganti dengan action yang sesuai jika tidak menggunakan Laravel -->
                            <!-- Jika tidak Laravel, hapus @csrf -->
                            <input type="hidden" name="_token" value="csrf_token_contoh"> <!-- Ganti dengan mekanisme CSRF jika diperlukan -->
                            
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

    <!-- Bootstrap JS (opsional untuk fitur interaktif) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>