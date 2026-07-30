<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\JenisController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BarangMasukController;
use App\Http\Controllers\BarangKeluarController;

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::resource('barang', BarangController::class);
Route::resource('jenis', JenisController::class)->parameter
('jenis', 'jenis');

Route::resource('barangMasuk', BarangMasukController::class);
Route::resource('barangKeluar', BarangKeluarController::class);