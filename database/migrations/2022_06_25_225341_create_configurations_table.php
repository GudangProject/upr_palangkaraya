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
        Schema::create('configurations', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->longText('description');
            $table->string('tags');
            $table->longText('logo');
            $table->string('owner_id');
            $table->string('created_by');
            $table->longText('address_map');
            $table->longText('address');
            $table->string('phone');
            $table->string('whatsapp');
            $table->string('twitter');
            $table->string('facebook');
            $table->string('instagram');
            $table->string('tiktok');
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
        Schema::dropIfExists('configurations');
    }
};
