```php
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard Penjualan</title>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>

<div class="wrapper">

    <!-- SIDEBAR -->
    <aside class="sidebar">

        <div class="logo">
            PENJUALAN
        </div>

        <nav>

            <a href="{{ route('dashboard') }}">
                🏠 Dashboard
            </a>

            <a href="{{ route('barangs.index') }}">
                📦 Barang
            </a>

            <a href="{{ route('transaksis.index') }}">
                🛒 Transaksi
            </a>

        </nav>

    </aside>


    <!-- KONTEN -->
    <main class="main-content">

        <header class="topbar">
            <h2>Dashboard</h2>
        </header>

        <section class="content">

            <div class="welcome">
                <h1>Dashboard</h1>

                <p>
                    Selamat datang di Sistem Penjualan.
                </p>
            </div>


            <!-- CARD -->

            <div class="cards">

                <div class="card">
                    <div class="card-icon">
                        📦
                    </div>

                    <div>
                        <h3>Jumlah Barang</h3>

                        <p>
                            {{ $jumlahBarang }}
                        </p>
                    </div>
                </div>


                <div class="card">
                    <div class="card-icon">
                        🛒
                    </div>

                    <div>
                        <h3>Jumlah Transaksi</h3>

                        <p>
                            {{ $jumlahTransaksi }}
                        </p>
                    </div>
                </div>


                <div class="card">
                    <div class="card-icon">
                        📊
                    </div>

                    <div>
                        <h3>Total Stok</h3>

                        <p>
                            {{ $totalStok }}
                        </p>
                    </div>
                </div>


                <div class="card">
                    <div class="card-icon">
                        💰
                    </div>

                    <div>
                        <h3>Total Penjualan</h3>

                        <p>
                            Rp {{ number_format($totalPenjualan, 0, ',', '.') }}
                        </p>
                    </div>
                </div>

            </div>


            <!-- MENU CEPAT -->

            <div class="quick-menu">

                <h2>Menu Cepat</h2>

                <div class="quick-buttons">

                    <a
                        href="{{ route('barangs.index') }}"
                        class="button"
                    >
                        📦 Kelola Barang
                    </a>


                    <a
                        href="{{ route('barangs.create') }}"
                        class="button"
                    >
                        ➕ Tambah Barang
                    </a>


                    <a
                        href="{{ route('transaksis.index') }}"
                        class="button"
                    >
                        🛒 Lihat Transaksi
                    </a>


                    <a
                        href="{{ route('transaksis.create') }}"
                        class="button"
                    >
                        ➕ Tambah Transaksi
                    </a>

                </div>

            </div>

        </section>

    </main>

</div>

</body>
</html>
