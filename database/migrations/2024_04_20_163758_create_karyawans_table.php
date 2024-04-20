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
        Schema::create('karyawans', function (Blueprint $table) {
            $table->id();
            $table->string('nama_karyawan');
            $table->string('alamat_karyawan');
            $table->date('tanggal_lahir_karyawan');
            $table->string('no_hp_karyawan');
            $table->string('username');
            $table->string('password');
            $table->float('total_gaji');
            $table->foreignId('id_role')->constrained('roles')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('id_presensi')->constrained('presensis')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('karyawans');
    }
};
