@extends('layouts.app')

@section('content')

<div class="card-container">

    <h1 class="page-title">Tambah Transaksi</h1>

    <p class="page-description">
        Silakan isi data transaksi di bawah ini.
    </p>

    <form action="{{ route('transaksis.store') }}" method="POST">

        @csrf

        <!-- BARANG -->
        <div class="form-group">
            <label for="barang_id">Pilih Barang</label>

            <select name="barang_id" id="barang_id" required>

                <option value="">-- Pilih Barang --</option>

                @foreach ($barangs as $barang)

                    <option value="{{ $barang->id }}">
                        {{ $barang->kode_barang }} -
                        {{ $barang->nama_barang }}
                        (Stok: {{ $barang->stok }})
                    </option>

                @endforeach

            </select>
        </div>

        <!-- JUMLAH -->
        <div class="form-group">
            <label for="jumlah">Jumlah</label>

            <input
                type="number"
                name="jumlah"
                id="jumlah"
                min="1"
                required
                placeholder="Masukkan jumlah barang"
            >
        </div>

        <!-- TOMBOL SIMPAN -->
        <button type="submit" class="button">
            💾 Simpan Transaksi
        </button>

    </form>

    <!-- TOMBOL KEMBALI -->
    <a href="{{ route('transaksis.index') }}" class="back-button">
        ← Kembali ke Transaksi
    </a>

</div>

@endsection