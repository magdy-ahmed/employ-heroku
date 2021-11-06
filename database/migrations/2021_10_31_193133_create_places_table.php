<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('places', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',150);
            $table->longText('content');
            $table->string('excerpt',250)->nullable();
            $table->timeTz('openAt', $precision = 0)->nullable();
            $table->timeTz('closeAt', $precision = 0)->nullable();
            $table->jsonb('daysClose')->nullable();
            $table->string('country',50)->nullable();
            $table->string('city',50)->nullable();
            $table->string('location')->nullable();
            $table->string('address')->nullable();
            $table->string('img',200)->nullable();
            $table->boolean('status')->default(true);
            $table->unsignedInteger('user_id');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('places');
    }
}
