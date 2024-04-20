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
        Schema::create('pengadaan_bahan_bakus', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal_pengadaan');
            $table->float('harga_bahan_baku');
            $table->foreignId('id_karyawan')->constrained('karyawans')->onDelete('restrict')->onUpdate('restrict');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengadaan_bahan_bakus');
    }
};
