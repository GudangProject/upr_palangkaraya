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
        Schema::create('prosiding_naskahs', function (Blueprint $table) {
            $table->id();
            $table->string('bidang_ilmu_id');
            $table->string('judul');
            $table->string('file_naskah');
            $table->string('ppt_file');
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
        Schema::dropIfExists('prosiding_naskahs');
    }
};
