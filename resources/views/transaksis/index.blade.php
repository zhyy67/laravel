@extends('layouts.app')

@section('content')

<div class="card-container">

    <h1 class="page-title">Data Transaksi</h1>

    <p class="page-description">
        Daftar transaksi penjualan yang telah dilakukan.
    </p>

    {{-- Alert sukses --}}
    @if (session('success'))
        <div class="alert-success">
            {{ session('success') }}
        </div>
    @endif

    {{-- Tombol tambah transaksi --}}
    <a href="{{ route('transaksis.create') }}" class="button">
        ➕ Tambah Transaksi
    </a>

    <div style="overflow-x:auto;">

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nomor Transaksi</th>
                    <th>Tanggal</th>
                    <th>Barang</th>
                    <th>Jumlah</th>
                    <th>Total Harga</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>

                @forelse ($transaksi as $item)

                    <tr>
                        <td>{{ $item->id }}</td>

                        <td>
                            {{ $item->nomer_transaksi }}
                        </td>

                        <td>
                            {{ $item->tanggal ? $item->tanggal->format('d-m-Y H:i') : '-' }}
                        </td>

                        <td>
                            {{ $item->barang->nama_barang ?? '-' }}
                        </td>

                        <td>
                            {{ $item->jumlah }}
                        </td>

                        <td>
                            Rp {{ number_format($item->total_harga, 0, ',', '.') }}
                        </td>

                        <td>
                            <form
                                action="{{ route('transaksis.destroy', $item->id) }}"
                                method="POST"
                                style="display:inline;"
                            >
                                @csrf
                                @method('DELETE')

                                <button
                                    type="submit"
                                    onclick="return confirm('Yakin ingin menghapus transaksi ini?')"
                                >
                                    🗑️ Hapus
                                </button>
                            </form>
                        </td>
                    </tr>

                @empty

                    <tr>
                        <td colspan="7" style="text-align:center;">
                            Belum ada transaksi.
                        </td>
                    </tr>

                @endforelse

            </tbody>
        </table>

    </div>

    <a href="{{ route('dashboard') }}" class="back-button">
        ← Kembali ke Dashboard
    </a>

</div>

@endsection