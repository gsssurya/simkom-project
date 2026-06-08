<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pilih Ormawa - SIMKOM Bali</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #F8FAFC;
        }
        .navbar-simkom {
            background-color: #0B1936;
        }
        .card-ormawa {
            border: none;
            border-radius: 16px;
            transition: transform 0.3s, box-shadow 0.3s;
            background-color: #FFFFFF;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05), 0 2px 4px -1px rgba(0, 0, 0, 0.03);
        }
        .card-ormawa:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }
        .btn-status-custom {
            font-weight: 700;
            padding: 10px 20px;
            border-radius: 10px;
            text-transform: uppercase;
            font-size: 0.85rem;
            letter-spacing: 0.5px;
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark navbar-simkom shadow-sm py-3">
        <div class="container">
            <a class="navbar-brand fw-bold d-flex align-items-center gap-2" href="#">
                <span class="bg-warning text-dark px-2 rounded">🎓</span> SIMKOM BALI
            </a>
            <span class="navbar-text text-white-50">Dashboard Mahasiswa</span>
        </div>
    </nav>

    <div class="container my-5">
        <div class="text-center mb-5">
            <h2 class="fw-bold text-dark">Pilih Organisasi Mahasiswa (Ormawa)</h2>
            <p class="text-muted">Temukan wadah terbaik untuk mengasah soft skill, berkolaborasi, dan berprestasi.</p>
        </div>

        <div class="row g-4">
            @foreach($organisasi as $org)
                @php
                    // Mengambil status pendaftaran mahasiswa untuk organisasi ini secara realtime
                    $statusMhsDisini = $riwayatPendaftaran[$org->id] ?? null;
                @endphp
                
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card card-ormawa h-100 p-4 d-flex flex-column justify-between">
                        <div class="card-body p-0">
                            <h4 class="card-title fw-bold text-dark mb-3">{{ $org->nama }}</h4>
                            
                            <p class="card-text text-secondary small line-clamp">
                                {{ $org->deskripsi ?? 'Ayo bergabung bersama kami untuk mengembangkan minat, bakat, dan soft skill Anda!' }}
                            </p>
                        </div>

                        <div class="mt-4">
                            @if($statusMhsDisini == 'diterima')
                                <button type="button" class="btn btn-success btn-status-custom w-full w-100" disabled>
                                    ✓ Sudah Bergabung
                                </button>
                            @elseif($statusMhsDisini == 'menunggu verifikasi')
                                <button type="button" class="btn btn-secondary btn-status-custom w-full w-100 text-white" disabled>
                                    ⏳ Menunggu Verifikasi
                                </button>
                            @else
                                <a href="{{ url('/dashboard/daftar-organisasi/' . $org->id) }}" class="btn btn-primary btn-status-custom w-full w-100 shadow-sm" style="background-color: #1D2D5E; border-color: #1D2D5E;">
                                    Daftar Organisasi
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div> </div> <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>