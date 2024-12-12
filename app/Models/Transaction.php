<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    // Jika tabel tidak mengikuti konvensi penamaan Laravel, sebutkan nama tabel
    protected $table = 'transactions'; // Misalkan nama tabel di database adalah 'transactions'

    // Tentukan kolom yang bisa diisi secara massal
    protected $fillable = [
        'tanggal_transaksi',
        'jumlah',
        'status',
        'tanggal_masuk',
        'nama_pelanggan',
        'jenis_layanan',
        'jenis_laundry',
        'berat',
        'metode_pembayaran',
        'total_harga',
    ];

    // Metode untuk menghitung harga berdasarkan jenis layanan dan laundry
    public static function calculatePrice($jenisLayanan, $jenisLaundry, $berat)
    {
        $layananPrices = [
            'Cuci setrika' => 5000,
            'Cuci lipat' => 4000,
            'Setrika saja' => 3000,
        ];

        $laundryPrices = [
            'Express' => 5000,
            '3 hari' => 3000,
            '2 hari' => 4000,
        ];

        // Menghitung total harga berdasarkan jenis layanan dan laundry
        $pricePerService = $layananPrices[$jenisLayanan] ?? 0; // Menggunakan null coalescing untuk default value
        $pricePerLaundry = $laundryPrices[$jenisLaundry] ?? 0; // Menggunakan null coalescing untuk default value
        
        return ($pricePerService + $pricePerLaundry) * $berat;
    }
}
