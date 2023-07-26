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
        Schema::create('prosiding_pembayarans', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('naskah_id');
            $table->string('no_transaksi');
            $table->timestamp('tanggal_bayar');
            $table->string('jumlah');
            $table->string('nama_pengirim');
            $table->string('bank_pengirim');
            $table->string('rekening_tujuan');
            $table->string('keterangan');
            $table->string('photo');
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
        Schema::dropIfExists('prosiding_pembayarans');
    }
};
