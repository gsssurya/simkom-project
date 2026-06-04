<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController; // Diubah jalurnya ke sini
use App\Http\Controllers\PendaftaranAnggotaController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::get('/login', function() { return "Halaman Login"; })->name('login');
Route::get('/dashboard', function() { return "Halaman Dashboard"; })->name('dashboard');