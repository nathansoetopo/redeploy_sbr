<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('motors', function (Blueprint $table) {
            $table->id();
            $table->string('nama_produk');
            $table->string('tipe')->index()->nullable();
            $table->string('plat')->references('nomor_polisi')->on('regions')->nullable();
            // $table->string('harga')->nullable();
            // $table->date('produksi')->nullable();
            $table->string('transmisi')->nullable();
            // $table->string('buatan')->nullable();
            // $table->string('model')->nullable();
            // $table->string('bahan_bakar')->nullable();
            // $table->string('ukuran_mesin')->nullable();
            // $table->string('torsi');
            // $table->string('gearbox');
            // $table->string('warna')->nullable();
            // $table->string('tipe_mesin')->nullable();
            $table->string('berat')->nullable();
            $table->string('vol_silinder')->nullable();
            $table->string('sistem_start')->nullable();
            $table->string('suspensi_depan')->nullable();
            $table->string('tipe_ban')->nullable();
            $table->string('volume')->nullable();
            $table->string('kapasitas_tangki')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('motors');
    }
};
