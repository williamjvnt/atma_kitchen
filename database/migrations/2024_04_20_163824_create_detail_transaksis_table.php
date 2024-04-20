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
        Schema::create('detail_transaksis', function (Blueprint $table) {
            $table->integer('jumlah_produk');
            $table->float('total_transaksi_produk');
            $table->foreignId('id_produk')->nullable()->constrained('produks')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('id_transaksi')->constrained('transaksis')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('id_hampers')->nullable()->constrained('hampers')->onDelete('restrict')->onUpdate('restrict');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_transaksis');
    }
};
