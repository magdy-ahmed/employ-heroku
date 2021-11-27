<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title',200)->nullable();
            $table->string('slug',200)->nullable();
            $table->longText('content')->nullable();
            $table->longText('code')->nullable()->unique();
            $table->string('img',200)->nullable();
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('category_id')->nullable();
            $table->timestamps();
             //FOREIGN KEY CONSTRAINTS
            $table->unique('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('set null');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profiles');
    }
}
