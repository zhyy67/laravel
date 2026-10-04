@extends('layouts.app')

@section('content')

<div class="card-container">

    <h1 class="page-title">Data Barang</h1>

    <p class="page-description">
        Daftar barang yang tersedia di sistem penjualan.
    </p>

    <a href="{{ route('barangs.create') }}" class="button">
        ➕ Tambah Barang
    </a>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>

            @foreach ($barangs as $barang)

            <tr>
                <td>{{ $barang->id }}</td>
                <td>{{ $barang->kode_barang }}</td>
                <td>{{ $barang->nama_barang }}</td>
                <td>
                    Rp {{ number_format($barang->harga, 0, ',', '.') }}
                </td>
                <td>{{ $barang->stok }}</td>

                <td>
                    <a href="{{ route('barangs.edit', $barang->id) }}">
                        ✏️ Edit
                    </a>

                    <form action="{{ route('barangs.destroy', $barang->id) }}"
                          method="POST"
                          style="display:inline;">

                        @csrf
                        @method('DELETE')

                        <button type="submit"
                                onclick="return confirm('Yakin ingin menghapus barang ini?')">
                            🗑️ Hapus
                        </button>

                    </form>
                </td>
            </tr>

            @endforeach

        </tbody>
    </table>

    <!-- TOMBOL KEMBALI -->
    <a href="{{ route('dashboard') }}" class="back-button">
        ← Kembali ke Dashboard
    </a>

</div>

@endsection