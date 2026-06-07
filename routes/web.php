<?php

use App\Http\Controllers\DashboardMonitoring\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('dashboard-monitoring', [DashboardController::class, 'index'])->name('dashboard-monitoring.index');