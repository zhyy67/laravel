@extends('layouts.app')

@section('content')

<div class="card-container">

    <h1 class="page-title">Tambah Barang</h1>

    <p class="page-description">
        Silakan isi data barang yang ingin ditambahkan.
    </p>

    <form action="{{ route('barangs.store') }}" method="POST">

        @csrf

        <!-- KODE BARANG -->
        <div class="form-group">
            <label for="kode_barang">Kode Barang</label>

            <input
                type="text"
                name="kode_barang"
                id="kode_barang"
                value="{{ old('kode_barang') }}"
                placeholder="Contoh: BRG001"
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
                value="{{ old('nama_barang') }}"
                placeholder="Masukkan nama barang"
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
                value="{{ old('harga') }}"
                placeholder="Contoh: 75000"
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
                value="{{ old('stok') }}"
                placeholder="Masukkan jumlah stok"
                min="0"
                required
            >
        </div>

        <!-- SIMPAN -->
        <button type="submit" class="button">
            💾 Simpan Barang
        </button>

    </form>

    <!-- KEMBALI -->
    <a href="{{ route('barangs.index') }}" class="back-button">
        ← Kembali ke Barang
    </a>

</div>

@endsection