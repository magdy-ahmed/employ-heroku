<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title',200);
            $table->string('slug',200)->nullable();
            $table->longText('content');
            $table->string('excerpt',350)->nullable();
            $table->string('img',200)->nullable();
            $table->integer('salery');
            $table->integer('discount')->nullable();
            $table->boolean('status')->default(true);
            $table->unsignedInteger('user_id')->nullable();
            $table->unsignedInteger('place_id')->nullable();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
            $table->foreign('place_id')->references('id')->on('places')->onDelete('set null');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('services');
    }
}
