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
        Schema::create('prosiding_pesertas', function (Blueprint $table) {
            $table->id();
            $table->string('sebutan')->nullable();
            $table->string('user_id');
            $table->string('nama_lengkap');
            $table->string('asal_institusi');
            $table->text('judul_artikel');
            $table->text('abstrak');
            $table->string('bidang_ilmu');
            $table->string('whatsapp')->nullable();
            $table->string('status');
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
        Schema::dropIfExists('prosiding_pesertas');
    }
};
