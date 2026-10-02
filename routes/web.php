<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\TransaksiController;
Route::get('/', function () {
    return view('welcome');
});

Route::resource('barangs', BarangController::class);
Route::resource('transaksis', TransaksiController::class);
Route::get('/transaksis/create', [TransaksiController::class, 'create'])->name('transaksis.create');
Route::delete('/transaksis/{id}', [TransaksiController::class, 'destroy'])->name('transaksis.destroy');
