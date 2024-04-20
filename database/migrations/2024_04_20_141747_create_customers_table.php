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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('nama_customer');
            $table->string('no_telepon_customer');
            $table->string('username');
            $table->string('password');
            $table->string('email_customer');
            $table->integer('poin_customer');
            $table->time('tanggal_lahir_customer');
            $table->float('jumlah_saldo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
