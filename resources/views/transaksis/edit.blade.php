<!DOCTYPE html>
<html>
<head>
    <title>Edit Transaksi</title>
</head>
<body>

    <h1>Edit Transaksi</h1>

    <form action="{{ route('transaksis.update', $transaksi->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Barang</label>
        <br>

        <select name="barang_id">
            @foreach ($barangs as $barang)
                <option value="{{ $barang->id }}"
                    {{ $transaksi->barang_id == $barang->id ? 'selected' : '' }}>
                    {{ $barang->kode_barang }} - {{ $barang->nama_barang }}
                    (Stok: {{ $barang->stok }})
                </option>
            @endforeach
        </select>

        <br><br>

        <label>Jumlah</label>
        <br>

        <input
            type="number"
            name="jumlah"
            min="1"
            value="{{ $transaksi->jumlah }}"
        >

        <br><br>

        <button type="submit">Update Transaksi</button>

    </form>

    <br>

    <a href="{{ route('transaksis.index') }}">Kembali</a>

</body>
</html>