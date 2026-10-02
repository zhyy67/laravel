<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Barang</title>
</head>
<body>

<h1>Edit Barang</h1>

<form action="{{ route('barangs.update', $barang->id) }}" method="POST">
    @csrf
    @method('PUT')

    <p>
        Kode Barang:<br>
        <input type="text" name="kode_barang" value="{{ $barang->kode_barang }}">
    </p>

    <p>
        Nama Barang:<br>
        <input type="text" name="nama_barang" value="{{ $barang->nama_barang }}">
    </p>

    <p>
        Harga:<br>
        <input type="number" name="harga" value="{{ $barang->harga }}">
    </p>

    <p>
        Stok:<br>
        <input type="number" name="stok" value="{{ $barang->stok }}">
    </p>

    <button type="submit">Update</button>
    <a href="{{ route('barangs.index') }}">Kembali</a>

</form>

</body>
</html>