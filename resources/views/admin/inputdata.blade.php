<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Transaksi Laundry</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head> 
<body>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h3 class="card-title">Form Transaksi Laundry</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="tanggalMasuk">Tanggal Masuk</label>
                        <input type="date" class="form-control" id="tanggalMasuk" name="tanggalMasuk" required>
                    </div>
                    <div class="form-group">
                        <label for="namaPelanggan">Nama Pelanggan</label>
                        <input type="text" class="form-control" id="namaPelanggan" name="namaPelanggan" placeholder="Masukkan nama pelanggan" required>
                    </div>
                    <div class="form-group">
                        <label for="jenisLayanan">Jenis Layanan</label>
                        <select class="form-control" id="jenisLayanan" name="jenisLayanan" required>
                            <option value="" disabled selected>Pilih jenis layanan</option>
                            <option value="Cuci setrika">Cuci Setrika</option>
                            <option value="Cuci lipat">Cuci Lipat</option>
                            <option value="Setrika saja">Setrika Saja</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="jenisLaundry">Jenis Laundry</label>
                        <select class="form-control" id="jenisLaundry" name="jenisLaundry" required>
                            <option value="" disabled selected>Pilih jenis laundry</option>
                            <option value="Express">Express</option>
                            <option value="2 hari">2 Hari</option>
                            <option value="3 hari">3 Hari</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="berat">Berat (kg)</label>
                        <input type="number" class="form-control" id="berat" name="berat" placeholder="Masukkan berat laundry" required>
                    </div>
                    <div class="form-group">
                        <label>Metode Pembayaran</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="metodePembayaran" id="cash" value="cash" required>
                            <label class="form-check-label" for="cash">Cash</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="metodePembayaran" id="transfer" value="transfer" required>
                            <label class="form-check-label" for="transfer">Transfer</label>
                        </div>
                    </div>
                    <div class="form-group d-flex justify-content-between">
                        <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">Back</a>
                        <button type="submit" class="btn btn-success">Simpan Transaksi</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
