<?php

use App\Http\Controllers\Bendahara\DashboardController;
use App\Http\Controllers\Bendahara\InfoOrmawaController;
use App\Http\Controllers\Bendahara\InputKeuanganController;
use App\Http\Controllers\Bendahara\LaporanController;
use App\Http\Controllers\Bendahara\LogAktivitasController;
use App\Http\Controllers\Bendahara\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;

Route::group([
    'prefix' => 'admin',
    'as' => 'admin.'
], function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
});

Route::group([
    'prefix' => 'pembina',
    'as' => 'pembina.'
], function () {
   // Tambahkan route untuk pembina di sini
});

Route::group([
    'prefix' => 'bendahara',
    'as' => 'bendahara.'
], function () {
    Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan.index');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::get('/info-ormawa', [InfoOrmawaController::class, 'index'])->name('info-ormawa.index');
    Route::get('/input-keuangan', [InputKeuanganController::class, 'create'])->name('input-keuangan.create');
    Route::get('/log-aktivitas', [LogAktivitasController::class, 'index'])->name('log-aktivitas.index');
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
});

Route::group([
    'prefix' => 'pengurus',
    'as' => 'pengurus.'
], function () {
   // Tambahkan route untuk pengurus di sini
});

Route::group([
    'prefix' => 'mahasiswa',
    'as' => 'mahasiswa.'
], function () {
   // Tambahkan route untuk mahasiswa di sini
});


