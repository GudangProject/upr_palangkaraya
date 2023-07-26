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
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->string('category_id')->nullable();
            $table->text('title');
            $table->text('slug');
            $table->longText('image');
            $table->string('type');
            $table->string('position');
            $table->string('experience');
            $table->string('specialisation');
            $table->string('work_location');
            $table->bigInteger('budget_min')->nullable();
            $table->bigInteger('budget_max')->nullable();
            $table->longText('description');
            $table->string('company_name')->nullable();
            $table->string('status');
            $table->text('tags');
            $table->string('created_by');
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
        Schema::dropIfExists('jobs');
    }
};
