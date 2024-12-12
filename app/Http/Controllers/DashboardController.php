<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction; // Pastikan model Transaction diimpor
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function dashboard()
    {
        // Menghitung total transaksi
        $transaksiCount = Transaction::count();

        // Menghitung total penghasilan dari transaksi yang statusnya 'Completed' dalam minggu ini
        $startOfWeek = Carbon::now()->startOfWeek(); // Mendapatkan awal minggu
        $endOfWeek = Carbon::now()->endOfWeek(); // Mendapatkan akhir minggu

        $totalPenghasilan = Transaction::where('status', 'Completed')
            ->whereBetween('tanggal_transaksi', [$startOfWeek, $endOfWeek])
            ->sum('total_harga'); // Pastikan kolom ini benar

        // Cek nilai totalPenghasilan
        if ($totalPenghasilan === null) {
            $totalPenghasilan = 0; // Jika tidak ada transaksi, set ke 0
        }

        // Mengirimkan data ke view
        return view('dashboard', compact('transaksiCount', 'totalPenghasilan'));
    }
}
