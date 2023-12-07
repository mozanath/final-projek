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
        Schema::create('pembelian_detail', function (Blueprint $table) {
            $table->id('pembelian_detail_id');
            $table->unsignedBigInteger('pembelian_detail_pembelian_id');
            $table->unsignedBigInteger('pembelian_detail_pakaian_id');
            $table->integer('pembelian_detail_jumlah')->default(0);
            $table->integer('pembelian_detail_total_harga')->default(0);
            $table->timestamps();

            $table->foreign('pembelian_detail_pembelian_id')->references('pembelian_id')->on('pembelian')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('pembelian_detail_pakaian_id')->references('pakaian_id')->on('pakaian')->onUpdate('cascade')->onDelete('cascade');
           
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembelian_detail');
    }
};
