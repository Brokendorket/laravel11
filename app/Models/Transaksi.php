<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $fillable = [
        'tanggal_masuk',
        'nama_pelanggan',
        'jenis_layanan',
        'jenis_laundry',
        'berat',
        'metode_pembayaran',
    ];
}
