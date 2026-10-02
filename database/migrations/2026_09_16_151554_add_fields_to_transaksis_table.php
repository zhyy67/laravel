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
        Schema::table('transaksis', function (Blueprint $table) {
            schema::table('transaksis', function (Blueprint $table) {
                $table->unsignedBigInteger('barang_id')->after('id');
                $table->integer('jumlah')->after('barang_id');
                $table->decimal('total_harga', 12, 2)->after('jumlah');

                $table->foreign('barang_id')->references('id')->on('barangs')->onDelete('cascade');
            });
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('transaksis', function (Blueprint $table) {
            $table->dropForeign(['barang_id']);
            $table->dropColumn(['barang_id', 'jumlah', 'total_harga']);
        });
    }
};
