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
        Schema::create('tb_doctors', function (Blueprint $table) {
            $table->bigIncrements('doctor_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('id_spesialis');
            $table->string('nama');
            $table->string('nomor_telepon');
            $table->string('email')->unique();
            $table->string('username')->unique();
            $table->string('password');
            $table->string('alamat');
            $table->timestamps();
        });

        Schema::table('tb_doctors', function (Blueprint $table) {
            $table->foreign('id_spesialis')->references('id')->on('tb_spesialis')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('doctors_details');
    }
};
