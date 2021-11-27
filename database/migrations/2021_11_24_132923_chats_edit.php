<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChatsEdit extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('chates_relationships');
        // Schema::table('chats', function (Blueprint $table) {
        //     $table->unsignedInteger('user_id')->nullable();
        //     $table->unsignedInteger('for_user_id')->nullable();
        //     $table->unsignedInteger('service_id')->nullable();
        //  //FOREIGN KEY CONSTRAINTS
        //     $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
        //     $table->foreign('for_user_id')->references('id')->on('users')->onDelete('set null');
        //     $table->foreign('service_id')->references('id')->on('services')->onDelete('set null');
        //  //SETTING THE PRIMARY KEYS
        //     $table->boolean('is_read')->default(false);

        // });
        // Schema::table('notifications', function (Blueprint $table) {
        //     $table->boolean('is_read')->default(false);

        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
