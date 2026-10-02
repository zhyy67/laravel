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
        Schema::create('derail_transaksi', function (Blueprint $table) {
            $table->id();
            
            $table->foreignId('transaksi_id')->constrained('transaksis')->onDelete('cascade');

            $table->foreignId('barang_id')->constrained('barangs')->onDelete('cascade');

            $table->decimal('harga', 12, 2);
            $table->integer('jumlah');
            $table->decimal('total', 12, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('derail_transaksi');
    }
};
