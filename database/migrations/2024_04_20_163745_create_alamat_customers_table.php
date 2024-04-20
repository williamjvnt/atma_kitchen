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
        Schema::create('alamat_customers', function (Blueprint $table) {
            $table->id();;
            $table->string("lokasi");
            $table->float("jarak_ke_lokasi");
            $table->string("satuan_jarak");
            $table->foreignId('id_customer')->constrained('customers')->onDelete('restrict')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alamat_customers');
    }
};
