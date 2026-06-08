<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selamat Datang - SIMKOM Bali</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #F8FAFC;
        }
        .left-banner {
            background: linear-gradient(135deg, #0B1936 0%, #1E3A8A 100%);
            color: white;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            padding: 3rem;
        }
        .stat-box {
            border-right: 1px solid rgba(255, 255, 255, 0.2);
        }
        .stat-box:last-child {
            border-right: none;
        }
        .right-form {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 3rem;
        }
        .form-container {
            width: 100%;
            max-width: 420px;
        }
        .form-control {
            background-color: #F1F5F9;
            border: 1px solid transparent;
            padding: 0.75rem 1rem;
            border-radius: 8px;
            color: #334155;
        }
        .form-control:focus {
            background-color: #FFFFFF;
            border-color: #1E3A8A;
            box-shadow: none;
        }
        .form-label {
            font-weight: 500;
            color: #334155;
            font-size: 0.9rem;
            margin-bottom: 0.4rem;
        }
        .btn-submit {
            background-color: #1D2D5E;
            color: white;
            border: none;
            padding: 0.8rem;
            border-radius: 8px;
            font-weight: 600;
            transition: all 0.2s;
        }
        .btn-submit:hover {
            background-color: #111C3A;
            color: white;
        }
        .link-forgot {
            text-decoration: none;
            font-size: 0.85rem;
            color: #334155;
        }
    </style>
</head>
<body>

<div class="container-fluid p-0">
    <div class="row g-0">
        
        <!-- ================= KIRI: BANNER INFORMASI (Sama seperti Register) ================= -->
        <div class="col-lg-5 d-none d-lg-flex left-banner">
            <div class="logo-section d-flex align-items-center gap-2">
                <div class="bg-warning text-dark p-2 rounded-3 d-flex align-items-center justify-content-center" style="width: 40px; height: 40px; font-weight: bold;">
                    🎓
                </div>
                <div>
                    <h5 class="m-0 fw-bold">SIMKOM</h5>
                    <small class="text-white-50" style="font-size: 0.75rem;">SIMKOM BALI</small>
                </div>
            </div>

            <div class="my-auto">
                <h1 class="fw-bold mb-3" style="font-size: 2.5rem; line-height: 1.2;">SELAMAT DATANG SIMKOMERS!</h1>
                <p class="text-white-50" style="font-size: 1.1rem; max-width: 420px;">
                    Satu Sistem, Seribu Aksi — Wadah Mahasiswa SIMKOM Bali untuk berorganisasi, berkarya, dan bertumbuh bersama.
                </p>
            </div>

            <div class="row text-start pt-4 border-top border-white-10">
                <div class="col-4 stat-box">
                    <h3 class="fw-bold m-0 text-warning">25+</h3>
                    <small class="text-white-50" style="font-size: 0.8rem;">Ormawa Aktif</small>
                </div>
                <div class="col-4 stat-box">
                    <h3 class="fw-bold m-0 text-success">500+</h3>
                    <small class="text-white-50" style="font-size: 0.8rem;">Anggota</small>
                </div>
                <div class="col-4 stat-box">
                    <h3 class="fw-bold m-0">120+</h3>
                    <small class="text-white-50" style="font-size: 0.8rem;">Kegiatan</small>
                </div>
            </div>
        </div>

        <!-- ================= KANAN: FORM LOGIN ================= -->
        <div class="col-lg-7 right-form">
            <div class="form-container">
                
                <h2 class="fw-bold text-dark m-0">Selamat Datang</h2>
                <p class="text-muted mb-4" style="font-size: 0.95rem;">Masuk untuk mengakses akun SIMKOM Anda</p>

                <!-- Alert jika error login -->
                @if($errors->has('login_error'))
                    <div class="alert alert-danger p-2 small border-0 rounded-3">
                        {{ $errors->first('login_error') }}
                    </div>
                @endif

                <form action="/login" method="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="mb-3">
                        <label class="form-label">NIM / Email</label>
                        <input type="text" name="login_input" class="form-control" placeholder="220010001 atau nama@stikom-bali.ac.id" value="{{ old('login_input') }}" required>
                    </div>

                    <div class="mb-3">
                        <div class="d-flex justify-content-between align-items-center mb-1">
                            <label class="form-label m-0">Password</label>
                            <a href="#" class="link-forgot">Lupa password?</a>
                        </div>
                        <input type="password" name="password" class="form-control" placeholder="password123" required>
                    </div>

                    <div class="mb-4 form-check">
                        <input type="checkbox" class="form-check-input" id="rememberMe">
                        <label class="form-check-label small text-muted" for="rememberMe">Ingat saya</label>
                    </div>

                    <button type="submit" class="btn btn-submit w-100">Masuk</button>
                </form>

                <p class="text-center mt-4 small text-muted">
                    Belum punya akun? <a href="/register" class="text-decoration-none fw-bold" style="color: #1E3A8A;">Daftar Disini</a>
                </p>

            </div>
        </div>

    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>