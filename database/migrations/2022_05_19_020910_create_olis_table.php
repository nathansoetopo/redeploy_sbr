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
        Schema::create('olis', function (Blueprint $table) {
            $table->id();
            $table->string('nama_oli')->nullable();
            $table->string('jenis')->nullable();
            // $table->string('harga');
            // $table->string('keterangan');
            // $table->string('part_code');
            $table->string('gambar')->nullable();
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
        Schema::dropIfExists('olis');
    }
};
