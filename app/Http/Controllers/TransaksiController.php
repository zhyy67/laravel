<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\Barang;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index()
    {
        $transaksi = Transaksi::with('barang')->get();

        return view('transaksi.index', compact('transaksi'));
    }

    public function create()
    {
        $barangs = Barang::all();

        return view('transaksi.create', compact('barangs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'barang_id' => 'required',
            'jumlah' => 'required|integer|min:1',
        ]);

        $barang = Barang::findOrFail($request->barang_id);

        if ($request->jumlah > $barang->stok) {
            return redirect()->back()->withErrors(['jumlah' => 'Jumlah melebihi stok yang tersedia']);
        }

        $total = $barang->harga * $request->jumlah;

        Transaksi::create([
            'barang_id' => $request->barang_id,
            'jumlah' => $request->jumlah,
            'total_harga' => $total,
        ]);

        $barang->decrement('stok', $request->jumlah);
        $barang->save();

        $transaksi->delete();

        return redirect('/transaksis');
    }

    
    
    public function destroy($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $barang = Barang::findOrFail($transaksi->barang_id);

        if ($transaksi->jumlah > $barang->stok) {
            return redirect()->back()->withErrors(['jumlah' => 'Jumlah melebihi stok yang tersedia']);
        }
        
        $barang->increment('stok', $transaksi->jumlah);
        $barang->save();

        $transaksi->delete();

        return redirect('/transaksis')->with('success', 'Transaksi berhasil dihapus');
    }

    public function edit($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $barangs = Barang::all(); 

        return view('transaksi.edit', compact('transaksi', 'barangs'));
    }

    public function update(Request $request, $id)
{
    $request->validate([
        'barang_id' => 'required|exists:barangs,id',
        'jumlah' => 'required|integer|min:1',
    ]);

    $transaksi = Transaksi::findOrFail($id);
    $barangLama = Barang::findOrFail($transaksi->barang_id);
    $barangLama->increment('stok', $transaksi->jumlah);
    $barangBaru = Barang::findOrFail($request->barang_id);
    if ($request->jumlah > $barangBaru->stok) {

        $barangLama->decrement('stok', $transaksi->jumlah);

        return back()
            ->withInput()
            ->with('error', 'Jumlah melebihi stok yang tersedia!');
    }

    $total = $barangBaru->harga * $request->jumlah;

    $transaksi->update([
        'barang_id' => $barangBaru->id,
        'jumlah' => $request->jumlah,
        'total_harga' => $total,
    ]);

    $barangBaru->decrement('stok', $request->jumlah);

    return redirect('/transaksis')
        ->with('success', 'Transaksi berhasil diperbarui!');
}
}