<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Transaksi Laundry</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }

        .container {
            margin-top: 20px;
        }

        .table-container {
            margin: 20px 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            font-size: 16px;
        }

        table th, table td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: center;
        }

        table th {
            background-color: #f4f6f7;
            font-weight: bold;
        }

        .table thead th {
            background-color: #007bff;
            color: white;
        }

        .btn-edit {
            background-color: #ffc107;
            color: white;
            border: none;
            padding: 5px 15px;
            cursor: pointer;
        }

        .btn-delete {
            background-color: #dc3545;
            color: white;
            border: none;
            padding: 5px 15px;
            cursor: pointer;
        }

        .btn-edit:hover, .btn-delete:hover {
            opacity: 0.8;
        }

        .btn-secondary {
            margin-top: 10px;
        }

        .text-right {
            text-align: right;
        }

        .action-buttons {
            display: flex;
            justify-content: space-between;
            gap: 10px; /* Adds space between the Edit and Delete buttons */
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h3 class="text-primary">Data Transaksi</h3>
            <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">Back</a>
        </div>

        <div class="table-container">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal Masuk</th>
                        <th>Nama Pelanggan</th>
                        <th>Jenis Layanan</th>
                        <th>Jenis Laundry</th>
                        <th>Berat(KG)</th>
                        <th>Metode Pembayaran</th>
                        <th>Total Harga</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($transactions as $index => $transaction)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $transaction->tanggal_masuk }}</td>
                        <td>{{ $transaction->nama_pelanggan }}</td>
                        <td>{{ $transaction->jenis_layanan }}</td>
                        <td>{{ $transaction->jenis_laundry }}</td>
                        <td>{{ $transaction->berat }}</td>
                        <td>{{ $transaction->metode_pembayaran }}</td>
                        <td>Rp {{ $transaction->total_harga }}</td>
                        <td class="text-right">
                            <div class="action-buttons">
                                <a href="{{ route('admin.editdata', ['id' => $transaction->id]) }}" class="btn-edit">Edit</a>
                                <form action="{{ route('admin.delete', ['id' => $transaction->id]) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-delete">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
