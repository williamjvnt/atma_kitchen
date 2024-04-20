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
        Schema::create('pengeluaran_lains', function (Blueprint $table) {
            $table->id();
            $table->string('jenis_pengeluaran');
            $table->float('nominal_pengeluaran');
            $table->foreignId('id_karyawan')->constrained('karyawans')->onDelete('restrict')->onUpdate('restrict');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengeluaran_lains');
    }
};
