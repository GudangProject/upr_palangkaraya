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
        Schema::create('jobs_applieds', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('jobs_id');
            $table->string('username')->nullable();
            $table->string('email')->nullable();
            $table->text('message')->nullable();
            $table->text('resume')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jobs_applieds');
    }
};
