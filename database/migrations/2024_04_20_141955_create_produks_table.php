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
        Schema::create('produks', function (Blueprint $table) {
            $table->id();
            $table->string('nama_produk');
            $table->float('harga_produk');
            $table->string('satuan_produk');
            $table->integer('stok_produk');
            $table->foreignId('id_kategori')->constrained('kategori_produks')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('id_penitip')->nullable()->constrained('penitips')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produks');
    }
};
