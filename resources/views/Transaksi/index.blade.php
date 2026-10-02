<!DOCTYPE html>
<html>
<head>
    <title>Data Transaksi</title>
</head>
<body>

    <h1>Data Transaksi</h1>

    @if (session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <a href="{{ route('transaksis.create') }}">Tambah Transaksi</a>

    <br><br>

    <table border="1" cellpadding="10">
        <tr>
            <th>No</th>
            <th>Barang</th>
            <th>Jumlah</th>
            <th>Total</th>
            <th>Tanggal</th>
            <th>Aksi</th>
        </tr>

        @forelse ($transaksi as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->barang->nama_barang ?? '-' }}</td>
                <td>{{ $item->jumlah }}</td>
                <td>Rp {{ number_format($item->total_harga, 0, ',', '.') }}</td>
                <td>{{ $item->created_at ? $item->created_at->format('d-m-Y H:i') : '-' }}</td>
                <td>
                    <a href="{{ route('transaksis.edit', $item->id) }}">Edit</a>
                    <form action="{{ route('transaksis.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus transaksi ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Hapus</button>
                    </form>
            </tr>
        @empty
            <tr>
                <td colspan="5">Belum ada transaksi</td>
            </tr>
        @endforelse

        
    </table>

</body>
</html>