<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Barang;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Barang::create([
            'kode_barang' => 'BRG001',
            'nama_barang' => 'Mouse Wireless',
            'harga' => 75000,
            'stok' => 20,
        ]);

        Barang::create([
            'kode_barang' => 'BRG002',
            'nama_barang' => 'Keyboard',
            'harga' => 120000,
            'stok' => 15,
        ]);

        Barang::create([
            'kode_barang' => 'BRG003',
            'nama_barang' => 'Headset',
            'harga' => 95000,
            'stok' => 10,
        ]);

        Barang::create([
            'kode_barang' => 'BRG004',
            'nama_barang' => 'Kabel Data',
            'harga' => 35000,
            'stok' => 30,
        ]);
        //
    }
}
