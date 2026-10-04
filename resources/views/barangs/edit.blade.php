@extends('layouts.app')

@section('content')

<div class="card-container">

    <h1 class="page-title">Edit Barang</h1>

    <p class="page-description">
        Ubah data barang yang dipilih.
    </p>

    <form action="{{ route('barangs.update', $barang->id) }}" method="POST">

        @csrf
        @method('PUT')

        <!-- KODE BARANG -->
        <div class="form-group">
            <label for="kode_barang">Kode Barang</label>

            <input
                type="text"
                name="kode_barang"
                id="kode_barang"
                value="{{ old('kode_barang', $barang->kode_barang) }}"
                required
            >
        </div>

        <!-- NAMA BARANG -->
        <div class="form-group">
            <label for="nama_barang">Nama Barang</label>

            <input
                type="text"
                name="nama_barang"
                id="nama_barang"
                value="{{ old('nama_barang', $barang->nama_barang) }}"
                required
            >
        </div>

        <!-- HARGA -->
        <div class="form-group">
            <label for="harga">Harga</label>

            <input
                type="number"
                name="harga"
                id="harga"
                value="{{ old('harga', $barang->harga) }}"
                min="0"
                required
            >
        </div>

        <!-- STOK -->
        <div class="form-group">
            <label for="stok">Stok</label>

            <input
                type="number"
                name="stok"
                id="stok"
                value="{{ old('stok', $barang->stok) }}"
                min="0"
                required
            >
        </div>

        <!-- SIMPAN PERUBAHAN -->
        <button type="submit" class="button">
            💾 Simpan Perubahan
        </button>

    </form>

    <!-- KEMBALI -->
    <a href="{{ route('barangs.index') }}" class="back-button">
        ← Kembali ke Barang
    </a>

</div>

@endsection