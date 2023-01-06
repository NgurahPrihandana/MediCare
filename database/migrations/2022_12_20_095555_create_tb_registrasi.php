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
        Schema::create('tb_registrasi', function (Blueprint $table) {
            $table->bigIncrements('id_registrasi');
            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('id_praktik');
            $table->string('nama_lengkap');
            $table->date('tanggal_lahir');
            $table->enum('jenis_kelamin',['L','P']);
            $table->longText('keluhan');
            $table->timestamp('tanggal_booking');
            $table->date('tanggal_kedatangan');
            $table->timestamps();
        });

        Schema::table('tb_registrasi', function (Blueprint $table) {
            $table->foreign('id_user')->references('id')->on('tb_users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_praktik')->references('id_praktik')->on('tb_praktik')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
