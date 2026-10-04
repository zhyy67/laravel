<?php

namespace App\Http\controllers;

use App\Models\Barang;
use App\Models\Transaksi;

class DashboardController extends Controller
{
    public function index()
    {
        $jumlahBarang = Barang::count();
        $jumlahTransaksi = Transaksi::count();

        $totalStok = Barang::sum('stok');
        $totalPenjualan = Transaksi::sum('total_harga');

        return view('dashboard', compact(
            'jumlahBarang',
            'jumlahTransaksi',
            'totalStok',
            'totalPenjualan'
        ));
    }
}