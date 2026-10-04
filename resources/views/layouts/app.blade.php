<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title ?? 'Penjualan' }}</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #f1f5f9;
            color: #1e293b;
        }

        /* LAYOUT */
        .wrapper {
            display: flex;
            min-height: 100vh;
        }

        /* SIDEBAR */
        .sidebar {
            width: 240px;
            min-height: 100vh;
            background: #1e293b;
            color: white;
            position: fixed;
            left: 0;
            top: 0;
        }

        .logo {
            height: 80px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            font-weight: bold;
            border-bottom: 1px solid #334155;
        }

        .sidebar nav {
            margin-top: 20px;
        }

        .sidebar nav a {
            display: block;
            padding: 15px 25px;
            color: white;
            text-decoration: none;
            font-size: 16px;
        }

        .sidebar nav a:hover {
            background: #334155;
        }

        /* BAGIAN UTAMA */
        .main-content {
            margin-left: 240px;
            width: calc(100% - 240px);
            min-height: 100vh;
        }

        /* TOPBAR */
        .topbar {
            height: 80px;
            background: white;
            display: flex;
            align-items: center;
            padding: 0 30px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        }

        .topbar h2 {
            font-size: 24px;
        }

            .content {
            padding: 30px;
        }

        /* TOMBOL BACK */
        .back-button {
            display: inline-block;
            margin-top: 25px;
            padding: 10px 18px;
            background: #64748b;
            color: white;
            text-decoration: none;
            border-radius: 8px;
            font-size: 14px;
        }

        .back-button:hover {
            background: #475569;
        }

        /* CARD */
        .card-container {
            background: white;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.08);
        }

        .page-title {
            font-size: 28px;
            margin-bottom: 8px;
        }

        .page-description {
            color: #64748b;
            margin-bottom: 25px;
        }

        /* TOMBOL */
        .button {
            display: inline-block;
            padding: 12px 20px;
            background: #1e293b;
            color: white;
            text-decoration: none;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .button:hover {
            background: #334155;
        }

                .alert-success {
            background: #dcfce7;
            color: #166534;
            padding: 12px 16px;
            border-radius: 8px;
            margin-bottom: 20px;
            border: 1px solid #86efac;
        }
        /* TABLE */
        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
        }

        th {
            background: #1e293b;
            color: white;
            padding: 14px;
            text-align: left;
        }

        td {
            padding: 14px;
            border-bottom: 1px solid #e2e8f0;
        }

        tr:hover {
            background: #f8fafc;
        }

        /* FORM */
        input,
        select,
        textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #cbd5e1;
            border-radius: 8px;
            margin-top: 5px;
        }

        button {
            padding: 8px 12px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
        }

        /* DASHBOARD */
        .cards {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
        }

        .card {
            background: white;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.08);
        }

        .card h3 {
            color: #64748b;
            font-size: 14px;
            margin-bottom: 10px;
        }

        .card p {
            font-size: 25px;
            font-weight: bold;
        }

        /* RESPONSIVE */
        @media (max-width: 1000px) {
            .cards {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 700px) {
            .sidebar {
                width: 180px;
            }

            .main-content {
                margin-left: 180px;
                width: calc(100% - 180px);
            }

            .cards {
                grid-template-columns: 1fr;
            }

            .content {
                padding: 20px;
            }
        }
    </style>
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


        <!-- BAGIAN UTAMA -->
        <main class="main-content">

            <!-- TOPBAR -->
            <header class="topbar">
                <h2>{{ $title ?? 'Dashboard' }}</h2>
            </header>

            <!-- ISI HALAMAN -->
           <section class="content">


    @yield('content')

</section>
        </main>

    </div>

</body>

</html>