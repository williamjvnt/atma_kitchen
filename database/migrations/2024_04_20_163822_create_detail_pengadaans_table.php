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
        Schema::create('detail_pengadaans', function (Blueprint $table) {
            $table->float('jumlah_detail_pengadaan');
            $table->float('subTotal_detail_pengadaan');
            $table->foreignId('id_pengadaan')->constrained('pengadaan_bahan_bakus')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('id_bahan_baku')->constrained('bahan_bakus')->onDelete('restrict')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_pengadaans');
    }
};
