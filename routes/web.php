```php
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\DashboardController;

// Halaman utama
Route::get('/', [DashboardController::class, 'index'])
    ->name('dashboard');

// Halaman Dashboard
Route::get('/dashboard', [DashboardController::class, 'index']);

// Halaman Barang
Route::resource('barangs', BarangController::class);

// Halaman Transaksi
Route::resource('transaksis', TransaksiController::class);