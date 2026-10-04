<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\Barang;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index()
    {
        $transaksi = Transaksi::with('barang')
            ->latest()
            ->get();

        return view('transaksis.index', compact('transaksi'));
    }

    public function create()
    {
        $barangs = Barang::where('stok', '>', 0)->get();

        return view('transaksis.create', compact('barangs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'barang_id' => 'required|exists:barangs,id',
            'jumlah' => 'required|integer|min:1',
        ]);

        $barang = Barang::findOrFail($request->barang_id);

        // Cek stok
        if ($request->jumlah > $barang->stok) {
            return redirect()
                ->back()
                ->withInput()
                ->withErrors([
                    'jumlah' => 'Jumlah melebihi stok yang tersedia.'
                ]);
        }

        // Hitung total harga
        $total = $barang->harga * $request->jumlah;

        // Buat nomor transaksi otomatis
        $nomerTransaksi = 'TRX-' . date('YmdHis') . '-' . rand(100, 999);

        // Simpan transaksi
        Transaksi::create([
            'nomer_transaksi' => $nomerTransaksi,
            'tanggal' => now(),
            'barang_id' => $request->barang_id,
            'jumlah' => $request->jumlah,
            'total_harga' => $total,
        ]);

        // Kurangi stok
        $barang->decrement('stok', $request->jumlah);

        return redirect()
            ->route('transaksis.index')
            ->with('success', 'Transaksi berhasil ditambahkan.');
    }

    public function destroy($id)
    {
        $transaksi = Transaksi::findOrFail($id);

        // Kembalikan stok barang
        $barang = Barang::find($transaksi->barang_id);

        if ($barang) {
            $barang->increment('stok', $transaksi->jumlah);
        }

        $transaksi->delete();

        return redirect()
            ->route('transaksis.index')
            ->with('success', 'Transaksi berhasil dihapus.');
    }
}