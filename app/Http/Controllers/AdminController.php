<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;  // Pastikan model ini benar

class AdminController extends Controller
{
    // Method untuk menampilkan dashboard dengan jumlah transaksi dan penghasilan total
    public function dashboard()
    {
        // Mendapatkan jumlah semua transaksi
        $transaksiCount = Transaction::count();
        
        // Mendapatkan transaksi untuk tahun tertentu (misal 2024)
        $tahun = 2024;
        $transaksiTahun = Transaction::whereYear('tanggal_masuk', $tahun)->get();

        // Menghitung total penghasilan dari semua transaksi
        $totalPenghasilan = Transaction::sum('total_harga');

        // Mengirim data ke view dashboard
        return view('admin.dashboard', compact('transaksiCount', 'transaksiTahun', 'tahun', 'totalPenghasilan'));
    }

    // Method untuk menampilkan form input data
    public function inputdata()
    {
        return view('admin.inputdata');
    }

    // Method untuk menyimpan data transaksi dari form
    public function store(Request $request)
    {
        // Validasi data request
        $request->validate([
            'tanggalMasuk' => 'required|date',
            'namaPelanggan' => 'required|string|max:255',
            'jenisLayanan' => 'required|string',
            'jenisLaundry' => 'required|string',
            'berat' => 'required|numeric',
            'metodePembayaran' => 'required|string',
        ]);

        // Menghitung total harga berdasarkan jenis layanan, jenis laundry, dan berat
        $totalHarga = $this->calculatePrice(
            $request->jenisLayanan,
            $request->jenisLaundry,
            $request->berat
        );

        // Membuat record transaksi baru di database
        Transaction::create([
            'tanggal_masuk' => $request->tanggalMasuk,
            'nama_pelanggan' => $request->namaPelanggan,
            'jenis_layanan' => $request->jenisLayanan,
            'jenis_laundry' => $request->jenisLaundry,
            'berat' => $request->berat,
            'metode_pembayaran' => $request->metodePembayaran,
            'total_harga' => $totalHarga,
        ]);

        // Redirect ke dashboard setelah data disimpan
        return redirect()->route('admin.dashboard')->with('success', 'Transaksi berhasil disimpan!');
    }

    // Method untuk melihat semua data transaksi
    public function viewdata()
    {
        $transactions = Transaction::all();
        return view('admin.viewdata', compact('transactions'));
    }

    // Method untuk menampilkan form edit data transaksi
    public function editdata($id)
    {
        $transaction = Transaction::findOrFail($id);
        return view('admin.editdata', compact('transaction'));
    }

    // Method untuk memperbarui data transaksi
    public function update(Request $request, $id)
    {
        $request->validate([
            'tanggalMasuk' => 'required|date',
            'namaPelanggan' => 'required|string|max:255',
            'jenisLayanan' => 'required|string',
            'jenisLaundry' => 'required|string',
            'berat' => 'required|numeric',
            'metodePembayaran' => 'required|string',
        ]);

        $transaction = Transaction::findOrFail($id);

        // Menghitung total harga
        $totalHarga = $this->calculatePrice(
            $request->jenisLayanan,
            $request->jenisLaundry,
            $request->berat
        );

        // Update record transaksi di database
        $transaction->update([
            'tanggal_masuk' => $request->tanggalMasuk,
            'nama_pelanggan' => $request->namaPelanggan,
            'jenis_layanan' => $request->jenisLayanan,
            'jenis_laundry' => $request->jenisLaundry,
            'berat' => $request->berat,
            'metode_pembayaran' => $request->metodePembayaran,
            'total_harga' => $totalHarga,
        ]);

        return redirect()->route('admin.viewdata')->with('success', 'Transaksi berhasil diperbarui');
    }

    // Method untuk menghapus transaksi
    public function delete($id)
    {
        $transaction = Transaction::find($id);
        if ($transaction) {
            $transaction->delete();
            return redirect()->route('admin.viewdata')->with('success', 'Transaksi berhasil dihapus');
        }
        return redirect()->route('admin.viewdata')->with('error', 'Transaksi tidak ditemukan');
    }

    // Method untuk menghitung harga berdasarkan jenis layanan, jenis laundry, dan berat
    private function calculatePrice($jenisLayanan, $jenisLaundry, $berat)
    {
        // Logika perhitungan harga sesuai dengan kebutuhan Anda
        $hargaPerKg = 0;

        // Tentukan harga per kg berdasarkan jenis layanan
        if ($jenisLayanan == 'Express') {
            $hargaPerKg += 5000;
        } else {
            $hargaPerKg += 3000;
        }

        // Tentukan tambahan harga per kg berdasarkan jenis laundry
        if ($jenisLaundry == 'Dry Clean') {
            $hargaPerKg += 7000;
        } else {
            $hargaPerKg += 4000;
        }

        // Total harga dihitung berdasarkan berat dan harga per kg
        return $hargaPerKg * $berat;
    }
}
