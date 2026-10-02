<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Barang</title>
</head>

<body>

    <h1>Data Barang</h1>
    <a href="{{ route('barangs.create') }}">Tambah Barang</a><br><br>
    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($barangs as $barang)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $barang->kode_barang }}</td>
                    <td>{{ $barang->nama_barang }}</td>
                    <td>Rp {{$barang->harga}}</td>
                    <td>{{ $barang->stok }}</td>
                    <td>
                        
    <a href="{{ route('barangs.edit', $barang->id) }}">Edit</a>

    <form action="{{ route('barangs.destroy', $barang->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" onclick="return confirm('Yakin ingin menghapus barang ini?')">
            Hapus
        </button>
    </form>
</td>
                       
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">Belum ada data barang.</td>
                </tr>
            @endforelse
        </tbody>
        <tbody>
            
    </table>

</body>
</html>