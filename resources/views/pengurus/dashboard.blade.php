<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Pengurus - SIMKOM Bali</title>
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Fonts: Plus Jakarta Sans -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #F8FAFC;
        }
        .wrapper {
            display: flex;
            align-items: stretch;
            min-height: 100vh;
        }
        #sidebar {
            min-width: 260px;
            max-width: 260px;
            background-color: #0B1936;
            color: #fff;
            transition: all 0.3s;
            padding: 2rem 1.5rem;
        }
        #content {
            width: 100%;
            padding: 2.5rem;
        }
        .sidebar-header .logo-box {
            background-color: #EAB308;
            color: #0B1936;
            width: 35px;
            height: 35px;
            font-weight: 700;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 8px;
        }
        .nav-menu {
            list-style: none;
            padding: 0;
            margin-top: 3rem;
        }
        .nav-menu li a {
            color: #94A3B8;
            text-decoration: none;
            display: block;
            padding: 0.8rem 1rem;
            border-radius: 8px;
            font-weight: 500;
            margin-bottom: 0.5rem;
            transition: all 0.2s;
        }
        .nav-menu li a.active, .nav-menu li a:hover {
            background-color: rgba(255, 255, 255, 0.08);
            color: #FFFFFF;
        }
        .btn-logout {
            background: none;
            border: none;
            color: #EF4444;
            padding: 0.8rem 1rem;
            font-weight: 600;
            width: 100%;
            text-align: left;
        }
        .stat-card {
            background: #FFFFFF;
            border: none;
            border-radius: 12px;
            box-shadow: 0 4px 6px -1px rgba(0,0,0,0.02);
            padding: 1.5rem;
        }
        .main-table-card {
            background: #FFFFFF;
            border: none;
            border-radius: 14px;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.04);
            padding: 1.5rem;
        }
        .table thead th {
            background-color: #F8FAFC;
            color: #64748B;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 0.75rem;
            letter-spacing: 0.5px;
            border-bottom: none;
            padding: 1rem;
        }
        .table tbody td {
            padding: 1.2rem 1rem;
            color: #334155;
            font-size: 0.9rem;
            border-bottom: 1px solid #F1F5F9;
        }
        .badge-status {
            font-weight: 600;
            font-size: 0.8rem;
            padding: 0.4rem 0.8rem;
            border-radius: 6px;
            display: inline-block;
        }
        .status-waiting { background-color: #FFFAF0; color: #D97706; }
        .status-approved { background-color: #ECFDF5; color: #059669; }
        .status-rejected { background-color: #FEF2F2; color: #DC2626; }
        .btn-action-success {
            background-color: #10B981;
            color: white;
            border: none;
            font-weight: 600;
            font-size: 0.85rem;
            padding: 0.4rem 1rem;
            border-radius: 6px;
            transition: opacity 0.2s;
        }
        .btn-action-danger {
            background-color: #EF4444;
            color: white;
            border: none;
            font-weight: 600;
            font-size: 0.85rem;
            padding: 0.4rem 1rem;
            border-radius: 6px;
            transition: opacity 0.2s;
        }
        .btn-action-success:hover, .btn-action-danger:hover {
            opacity: 0.85;
        }
    </style>
</head>
<body>

<div class="wrapper">
    <!-- ================= SIDEBAR NAVIGASI ================= -->
    <nav id="sidebar">
        <div class="sidebar-header d-flex align-items-center gap-2">
            <div class="logo-box">🎓</div>
            <div>
                <h6 class="m-0 fw-bold text-white">SIMKOM</h6>
                <small class="text-white-50" style="font-size: 0.7rem;">SIMKOM BALI</small>
            </div>
        </div>

        <ul class="nav-menu">
            <li><a href="#" class="active">📋 Verifikasi Anggota</a></li>
            <li><a href="#">📅 Kegiatan Ormawa</a></li>
            <li><a href="#">💰 Laporan Keuangan</a></li>
            <li class="mt-5">
                <form action="/logout" method="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <button type="submit" class="btn-logout">🚪 Keluar Sistem</button>
                </form>
            </li>
        </ul>
    </nav>

    <!-- ================= ISI KONTEN DASHBOARD ================= -->
    <div id="content">
        <!-- Header Panel -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h3 class="fw-bold text-dark m-0">Panel Verifikasi Pendaftaran</h3>
                <p class="text-muted m-0" style="font-size: 0.95rem;">Kelola persetujuan anggota baru organisasi Anda</p>
            </div>
        </div>

        <!-- Notifikasi Aksi -->
        @if(session('success'))
            <div class="alert alert-success border-0 shadow-sm mb-4 py-2 small">{{ session('success') }}</div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger border-0 shadow-sm mb-4 py-2 small">{{ session('error') }}</div>
        @endif

        <!-- Kartu Penghitung Statistik Singkat -->
        <div class="row g-3 mb-4">
            <div class="col-md-4">
                <div class="stat-card">
                    <small class="text-muted fw-medium d-block mb-1">Total Pendaftar</small>
                    <h3 class="fw-bold text-dark m-0">{{ count($pendaftar) }}</h3>
                </div>
            </div>
            <div class="col-md-4">
                <div class="stat-card">
                    <small class="text-muted fw-medium d-block mb-1">Belum Diperiksa</small>
                    <h3 class="fw-bold text-warning m-0">{{ count($pendaftar->where('status', 'menunggu verifikasi')) }}</h3>
                </div>
            </div>
            <div class="col-md-4">
                <div class="stat-card">
                    <small class="text-muted fw-medium d-block mb-1">Telah Disetujui</small>
                    <h3 class="fw-bold text-success m-0">{{ count($pendaftar->where('status', 'diterima')) }}</h3>
                </div>
            </div>
        </div>

        <!-- Tabel Utama Pendaftaran -->
        <div class="main-table-card">
            <div class="table-responsive">
                <table class="table align-middle m-0">
                    <thead>
                        <tr>
                            <th>NIM</th>
                            <th>Nama Lengkap</th>
                            <th>Program Studi / Smt</th>
                            <th>Berkas Lampiran</th>
                            <th>Status Berkas</th>
                            <th class="text-center">Tindakan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($pendaftar as $row)
                        <tr>
                            <td class="fw-bold text-secondary">{{ $row->nim }}</td>
                            <td class="fw-semibold text-dark">{{ $row->nama }}</td>
                            <td>{{ $row->nama_prodi }} <span class="text-muted small">(Smt {{ $row->semester }})</span></td>
                            <td>
                                @if($row->dokumen_pendukung)
                                    <a href="{{ asset($row->dokumen_pendukung) }}" target="_blank" class="btn btn-sm btn-link text-decoration-none p-0 fw-bold text-primary">👁 Lihat Berkas</a>
                                @else
                                    <span class="text-muted small italic">Tidak ada</span>
                                @endif
                            </td>
                            <td>
                                @if($row->status == 'menunggu verifikasi')
                                    <span class="badge-status status-waiting">Menunggu</span>
                                @elseif($row->status == 'diterima')
                                    <span class="badge-status status-approved">Diterima</span>
                                @else
                                    <span class="badge-status status-rejected">Ditolak</span>
                                @endif
                            </td>
                            <td>
                                <div class="d-flex justify-content-center gap-2">
                                    @if($row->status == 'menunggu verifikasi')
                                        <!-- Form Persetujuan -->
                                        <form action="/pengurus/verifikasi/{{ $row->id }}" method="POST">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <input type="hidden" name="status" value="diterima">
                                            <button type="submit" class="btn-action-success">Setujui</button>
                                        </form>
                                        <!-- Form Penolakan -->
                                        <form action="/pengurus/verifikasi/{{ $row->id }}" method="POST">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <input type="hidden" name="status" value="ditolak">
                                            <button type="submit" class="btn-action-danger">Tolak</button>
                                        </form>
                                    @else
                                        <span class="text-muted small fw-medium">Selesai diproses</span>
                                    @endif
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center py-5 text-muted">
                                🌟 Belum ada pengajuan pendaftaran masuk untuk organisasi Anda.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>