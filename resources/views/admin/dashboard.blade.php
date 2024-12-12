    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dashboard</title>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
        <style>
            body {
                font-family: 'Poppins', sans-serif;
            }

            .bg-dark {
                background-color: #343a40 !important;
            }

            .sidebar {
                min-height: 100vh;
            }

            .main-content {
                padding: 20px;
            }

            .card-custom {
                border-radius: 10px;
                padding: 20px;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            }

            .dashboard-header {
                display: flex;
                justify-content: space-between;
                align-items: center;
                margin-bottom: 20px;
            }

            .dashboard-header h1 {
                font-size: 24px;
                font-weight: bold;
            }

            .stats-box, .laporan-box {
                background-color: #f8f9fa;
                padding: 20px;
                border-radius: 10px;
                text-align: center;
            }

            .laporan-box {
                background-color: #e9ecef;
            }

            .transaction-container {
                max-width: 650px;
                max-height: 300px;
                overflow-y: auto;
                border: 1px solid #ddd;
                border-radius: 8px;
                background-color: #f9f9f9;
                margin: 0;
            }

            .table-title {
                font-weight: bold;
                background-color: #f9f9f9;
                padding: 10px;
                border-top-left-radius: 8px;
                border-top-right-radius: 8px;
                border-bottom: 1px solid #ddd;
                margin: 0;
            }

            table {
                width: 100%;
                border-collapse: collapse;
            }

            th, td {
                padding: 6px 8px;
                border: 1px solid #ddd;
                font-size: 13px;
            }

            th {
                background-color: #f1f1f1;
                font-weight: bold;
                text-align: left;
                position: sticky;
                top: 0;
                z-index: 2;
            }

            td {
                text-align: left;
            }

            .no-data {
                color: #6c757d;
                font-style: italic;
            }
        </style>
    </head>

    <body>
        <div class="container-fluid">
            <div class="row">
                <nav class="col-md-3 col-lg-2 d-md-block bg-dark sidebar">
                    <div class="position-sticky pt-3">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link active text-white" href="dashboard">Dashboard</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white" href="inputdata">Input Transaksi</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white" href="viewdata">Lihat data transaksi</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white" href="presensipegawai">Presensi Pegawai</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white" href="viewpresensi">Lihat data Presensi</a>
                            </li>
                        </ul>
                    </div>
                </nav>

                <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                    <div class="main-content">
                        <div class="dashboard-header">
                            <h1>Halaman Dashboard</h1>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="btn btn-outline-danger">Logout</button>
                            </form>
                        </div>
z
                        <div class="row">
                            <div class="col-md-6 col-lg-4">
                                <div class="card-custom bg-light">
                                    <h2>Data Transaksi</h2>
                                    <p>{{ $transaksiCount }}</p>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4">
                                <div class="stats-box">
                                    <h2>Penghasilan</h2>
                                    <p>Rp. {{ number_format($totalPenghasilan, 0, ',', '.') }}</p>
                                    <p>0% Minggu ini</p>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4">
                                <div class="laporan-box">
                                    <h2>Laporan</h2>
                                    <p>Total Order: {{ $transaksiCount }}</p>
                                    <p>Received: 0</p>
                                    <p>On Progress: 0</p>
                                    <p>Completed: 0</p>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col">
                                <div class="transaction-container">
                                    <div class="table-title">Transaksi Tahun {{ $tahun }}</div>
                                    @if($transaksiTahun->count() > 0)
                                        <table>
                                            <thead>
                                                <tr>
                                                    <th>Nama Pelanggan</th>
                                                    <th>Tanggal Masuk</th>
                                                    <th>Jenis Layanan</th>
                                                    <th>Jenis Laundry</th>
                                                    <th>Berat</th>
                                                    <th>Total Harga</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($transaksiTahun as $transaksi)
                                                    <tr>
                                                        <td>{{ $transaksi->nama_pelanggan }}</td>
                                                        <td>{{ $transaksi->tanggal_masuk }}</td>
                                                        <td>{{ $transaksi->jenis_layanan }}</td>
                                                        <td>{{ $transaksi->jenis_laundry }}</td>
                                                        <td>{{ $transaksi->berat }} kg</td>
                                                        <td>Rp. {{ number_format($transaksi->total_harga, 0, ',', '.') }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    @else
                                        <p class="no-data">Tidak ada transaksi untuk tahun ini.</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    </body>

    </html>
