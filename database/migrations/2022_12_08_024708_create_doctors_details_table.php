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
        Schema::create('doctors_details', function (Blueprint $table) {
            $table->unsignedBigInteger('doctor_id');
            $table->unsignedBigInteger('id_spesialis');
            $table->string('nama');
            $table->string('nomor_telepon');
            $table->string('alamat');
            $table->timestamps();
        });

        Schema::table('doctors_details', function (Blueprint $table) {
            $table->foreign('doctor_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            
            $table->foreign('id_spesialis')->references('id')->on('spesialis')->onUpdate('cascade')->onDelete('cascade');
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
