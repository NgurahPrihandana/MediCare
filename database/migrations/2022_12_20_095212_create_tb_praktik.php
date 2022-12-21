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
        Schema::create('tb_praktik', function (Blueprint $table) {
            $table->bigIncrements('id_praktik');
            $table->unsignedBigInteger('id_jadwal');
            $table->unsignedBigInteger('doctor_id');
            $table->time('waktu_awal');
            $table->time('waktu_akhir');
            $table->timestamps();
        });

        Schema::table('tb_praktik', function (Blueprint $table) {
            $table->foreign('id_jadwal')->references('id_jadwal')->on('tb_jadwal')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('doctor_id')->references('doctor_id')->on('tb_doctors')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_praktik');
    }
};
