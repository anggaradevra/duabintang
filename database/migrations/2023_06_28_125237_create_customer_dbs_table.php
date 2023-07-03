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
        Schema::create('customer_dbs', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->string('nama_toko');
            $table->string('nama_customer');
            $table->biginteger('no_wa');
            $table->string('alamat');
            $table->string('Order');
            $table->integer('Pembelian');
            $table->string('keterangan');
            $table->string('foto_customer');
            $table->string('foto_toko');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer_dbs');
    }
};
