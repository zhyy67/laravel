<!DOCTYPE html>
<html>
<head>
    <title>Tambah Transaksi</title>
</head>
<body>

    <h1>Tambah Transaksi</h1>

    <form action="{{ route('transaksis.store') }}" method="POST">
        @csrf

        <label>Barang</label>
        <br>

        <select name="barang_id">
            <option value="">-- Pilih Barang --</option>

            @foreach ($barangs as $barang)
                <option value="{{ $barang->id }}">
                    {{ $barang->kode_barang }} - {{ $barang->nama_barang }} (Stok: {{ $barang->stok }})
                </option>
            @endforeach
        </select>

        <br><br>

        <label>Jumlah</label>
        <br>

        <input type="number" name="jumlah" min="1">

        <br><br>

        <button type="submit">Simpan Transaksi</button>
    </form>

    <br>

    <a href="{{ route('transaksis.index') }}">Kembali</a>

</body>
</html>