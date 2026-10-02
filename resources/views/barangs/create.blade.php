<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Barang</title>
</head>
<body>

    <h1>Tambah Barang</h1>

    <form action="{{ route('barangs.store') }}" method="POST">
        @csrf

        <label>Kode Barang</label><br>
        <input type="text" name="kode_barang" maxlength="20"><br><br>

        <label>Nama Barang</label><br>
        <input type="text" name="nama_barang" maxlength="100"><br><br>

        <label>Harga</label><br>
        <input type="number" name="harga" step="0.01"><br><br>

        <label>Stok</label><br>
        <input type="number" name="stok" min="0"><br><br>

        <button type="submit">Simpan</button>

        <a href="{{ route('barangs.index') }}">Kembali</a>
    </form>

</body>
</html>