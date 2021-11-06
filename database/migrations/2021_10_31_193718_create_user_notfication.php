<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserNotfication extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_notfication', function (Blueprint $table) {
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('notfication_id');
         //FOREIGN KEY CONSTRAINTS
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('notfication_id')->references('id')->on('notifications')->onDelete('cascade');
         //SETTING THE PRIMARY KEYS
            $table->primary(['user_id','notfication_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_notfication');
    }
}
