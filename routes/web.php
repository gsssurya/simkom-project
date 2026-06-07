<?php

use App\Http\Controllers\FinanceManagement\DashboardController;
use App\Http\Controllers\FinanceManagement\InfoOrmawaController;
use App\Http\Controllers\FinanceManagement\InputKeuanganController;
use App\Http\Controllers\FinanceManagement\LaporanController;
use App\Http\Controllers\FinanceManagement\LogAktivitasController;
use App\Http\Controllers\FinanceManagement\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan.index');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
Route::get('/info-ormawa', [InfoOrmawaController::class, 'index'])->name('info-ormawa.index');
Route::get('/input-keuangan', [InputKeuanganController::class, 'create'])->name('input-keuangan.create');
Route::get('/log-aktivitas', [LogAktivitasController::class, 'index'])->name('log-aktivitas.index');
Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');