<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\JenisController;
use App\Http\Controllers\DashboardController;

Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::resource('barang', BarangController::class);
Route::resource('jenis', JenisController::class)->parameter
('jenis', 'jenis');