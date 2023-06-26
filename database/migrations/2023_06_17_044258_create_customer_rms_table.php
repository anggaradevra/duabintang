<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('customer_rms', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->string('nama_toko');
            $table->string('nama_customer');
            $table->biginteger('no_wa');
            $table->string('alamat');
            $table->string('produk');
            $table->integer('jumlah_stok');
            $table->integer('penjualan');
            $table->string('foto_customer');
            $table->string('foto_toko');
            $table->string('keterangan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer_rms');
    }
};
