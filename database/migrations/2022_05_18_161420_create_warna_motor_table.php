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
        Schema::create('warna_motor', function (Blueprint $table) {
            $table->foreignId('id_motor')->constrained('motors')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreignId('id_warna')->constrained('warna')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->string('image');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('warna_motor');
    }
};
