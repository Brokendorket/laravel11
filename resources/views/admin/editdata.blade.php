<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Transaksi Laundry</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header bg-warning text-white">
                <h3 class="card-title">Edit Transaksi Laundry</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.update', $transaction->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="tanggalMasuk">Tanggal Masuk</label>
                        <input type="date" class="form-control" id="tanggalMasuk" name="tanggalMasuk" required value="{{ $transaction->tanggal_masuk }}">
                    </div>
                    <div class="form-group">
                        <label for="namaPelanggan">Nama Pelanggan</label>
                        <input type="text" class="form-control" id="namaPelanggan" name="namaPelanggan" placeholder="Masukkan nama pelanggan" required value="{{ $transaction->nama_pelanggan }}">
                    </div>
                    <div class="form-group">
                        <label for="jenisLayanan">Jenis Layanan</label>
                        <select class="form-control" id="jenisLayanan" name="jenisLayanan" required>
                            <option value="" disabled>Pilih jenis layanan</option>
                            <option value="Cuci setrika" {{ $transaction->jenis_layanan == 'Cuci setrika' ? 'selected' : '' }}>Cuci Setrika</option>
                            <option value="Cuci lipat" {{ $transaction->jenis_layanan == 'Cuci lipat' ? 'selected' : '' }}>Cuci Lipat</option>
                            <option value="Setrika saja" {{ $transaction->jenis_layanan == 'Setrika saja' ? 'selected' : '' }}>Setrika Saja</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="jenisLaundry">Jenis Laundry</label>
                        <select class="form-control" id="jenisLaundry" name="jenisLaundry" required>
                            <option value="" disabled>Pilih jenis laundry</option>
                            <option value="Express" {{ $transaction->jenis_laundry == 'Express' ? 'selected' : '' }}>Express</option>
                            <option value="2 hari" {{ $transaction->jenis_laundry == '2 hari' ? 'selected' : '' }}>2 Hari</option>
                            <option value="3 hari" {{ $transaction->jenis_laundry == '3 hari' ? 'selected' : '' }}>3 Hari</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="berat">Berat (kg)</label>
                        <input type="number" class="form-control" id="berat" name="berat" placeholder="Masukkan berat laundry" required value="{{ $transaction->berat }}">
                    </div>
                    <div class="form-group">
                        <label>Metode Pembayaran</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="metodePembayaran" id="cash" value="cash" {{ $transaction->metode_pembayaran == 'cash' ? 'checked' : '' }} required>
                            <label class="form-check-label" for="cash">Cash</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="metodePembayaran" id="transfer" value="transfer" {{ $transaction->metode_pembayaran == 'transfer' ? 'checked' : '' }} required>
                            <label class="form-check-label" for="transfer">Transfer</label>
                        </div>
                    </div>
                    <div class="form-group d-flex justify-content-between">
                        <a href="{{ route('admin.viewdata') }}" class="btn btn-secondary">Back</a>
                        <button type="submit" class="btn btn-success">Simpan Perubahan</button>
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
