<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksisTable extends Migration
{
    public function up()
    {
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal_masuk'); // Use snake_case for field names
            $table->string('nama_pelanggan');
            $table->string('jenis_layanan');
            $table->string('jenis_laundry');
            $table->decimal('berat', 5, 2); // Weight with two decimal precision
            $table->string('metode_pembayaran');
            $table->decimal('total_harga', 10, 2)->nullable(); // Adding the total_harga field
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('transaksis');
    }
}
