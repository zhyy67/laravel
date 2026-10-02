<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;

class BarangController extends Controller
{
    public function index()
{
    $barangs = Barang::all();

    return view('barangs.index', compact('barangs'));
//
}

public function create()
{
    return view('barangs.create');
}

public function edit(Barang $barang)
{
    return view('barangs.edit', compact('barang'));
}

public function store(Request $request)
{
    $request->validate([
        'kode_barang' => 'required|max:20',
        'nama_barang' => 'required|max:100',
        'harga' => 'required|numeric',
        'stok' => 'required|integer|min:1 ',
    ]);

    Barang::create([
        'kode_barang' => $request->kode_barang,
        'nama_barang' => $request->nama_barang,
        'harga' => $request->harga,
        'stok' => $request->stok,
    ]);

    return redirect()->route('barangs.index')
                     ->with('success', 'Barang created successfully.');
}

public function update(Request $request, Barang $barang)
{
    $request->validate([
        'kode_barang' => 'required|max:20',
        'nama_barang' => 'required|max:100',
        'harga' => 'required|numeric',
        'stok' => 'required|integer|min:1',
    ]);

    $barang->update([
        'kode_barang' => $request->kode_barang,
        'nama_barang' => $request->nama_barang,
        'harga' => $request->harga,
        'stok' => $request->stok,
    ]);

    return redirect()->route('barangs.index')
                     ->with('success', 'Barang updated successfully.');
}

public function destroy(Barang $barang)
{
    $barang->delete();

    return redirect()->route('barangs.index')
                     ->with('success', 'Barang deleted successfully.');
}
}