<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlaceServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('place_service', function (Blueprint $table) {
            $table->unsignedInteger('place_id');
            $table->unsignedInteger('service_id');
         //FOREIGN KEY CONSTRAINTS
            $table->foreign('place_id')->references('id')->on('places')->onDelete('cascade');
            $table->foreign('service_id')->references('id')->on('services')->onDelete('cascade');
         //SETTING THE PRIMARY KEYS
            $table->primary(['place_id','service_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('place_service');
    }
}
