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
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            $table->integer('jumlah_transaksi_produk');
            $table->integer('jumlah_poin_transaksi');
            $table->string('status_transaksi');
            $table->string('bukti_transaksi');
            $table->float('biaya_pengiriman');
            $table->dateTime('tanggal_pesan');
            $table->dateTime('tanggal_pelunasan');
            $table->dateTime('tanggal_ambil');
            $table->string('jenis_pengiriman');
            $table->float('jumlah_tip');
            $table->foreignId('id_customer')->constrained('customers')->onDelete('restrict')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksis');
    }
};
