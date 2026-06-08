<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController; 
use App\Http\Controllers\PendaftaranAnggotaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OrmawaApplyController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PengurusDashboardController;

// =========================================================================
// GUEST ROUTES (Rute yang Bisa Diakses Sebelum Login / Tanpa Login)
// =========================================================================

// RUTE DARURAT UNTUK JALUR MASUK INSTAN
Route::get('/auto-login', function() {
    // Kita pakai ID 2 untuk masuk sebagai akun maba2026@kampus.ac.id
    auth()->loginUsingId(2); 
    
    // Setelah login otomatis berhasil, langsung lempar ke halaman pilih ormawa
    return redirect('/pilih-ormawa');
});

// Halaman Landing Page Utama
Route::get('/', function () {
    return view('welcome');
});

// Tampilan & Proses Registrasi Akun Baru
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

// Tampilan & Proses Login / Logout
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


// =========================================================================
// AUTH ROUTES (Rute Pengaman Wajib Login - Menjaga Session Tetap Aman)
// =========================================================================
Route::middleware(['auth'])->group(function () {

    // 1. Dashboard Utama Mahasiswa
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // 2. Halaman Pilih Ormawa (Menampilkan daftar kartu ormawa)
    Route::get('/pilih-ormawa', [OrmawaApplyController::class, 'index'])->name('ormawa.pilih');
    Route::post('/pilih-ormawa', [OrmawaApplyController::class, 'store']);

    // 3. Formulir Detail Pendaftaran (Mengisi Alasan Bergabung)
    Route::get('/dashboard/daftar-organisasi/{id}', [PendaftaranAnggotaController::class, 'index'])->name('ormawa.index');
    
    // ACTION UTAMA: Proses Kirim Data Pendaftaran (Sudah Terlindungi Sesi Login)
    Route::post('/dashboard/daftar-organisasi/{id}/kirim', [PendaftaranAnggotaController::class, 'ajukanPendaftaran'])->name('ormawa.kirim');


    // =========================================================================
    // HAK AKSES KHUSUS: DASHBOARD PENGURUS ORMAWA
    // =========================================================================
    Route::get('/pengurus/dashboard', [PengurusDashboardController::class, 'index']);
    Route::post('/pengurus/verifikasi/{id}', [PengurusDashboardController::class, 'verifikasi']);


    // =========================================================================
    // HAK AKSES ROLE KHUSUS LAINNYA (Sesuai Kode Awal Anda)
    // =========================================================================
    // Hanya admin yang bisa mengelola organisasi
    Route::get('/admin/organisasi', [AdminController::class, 'index'])->middleware('role:admin');

    // Bendahara dan Pengurus bisa mengelola keuangan kegiatan
    Route::get('/kegiatan/keuangan', [KeuanganController::class, 'index'])->middleware('role:bendahara,pengurus');

    // Pembina bisa memantau kegiatan
    Route::get('/pembina/monitoring', [PembinaController::class, 'index'])->middleware('role:pembina');

});