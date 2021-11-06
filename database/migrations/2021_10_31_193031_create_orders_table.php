<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->float('payment');
            $table->float('remaining');
            $table->float('total');
            $table->enum('paymentStatus',['hold','review','reject','completed']);
            $table->enum('paymentType',['online','cash','deposit']);
            $table->enum('status',['hold','review','reject','hand','completed']);
            $table->text('customerComment')->nullable();
            $table->integer('customerRate')->nullable();
            $table->text('customerDesc')->nullable();
            $table->unsignedInteger('customer_id');
            $table->unsignedInteger('seller_id');
            $table->unsignedInteger('service_id');
            $table->timestamps();
             //FOREIGN KEY CONSTRAINTS
            $table->foreign('customer_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('seller_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('service_id')->references('id')->on('services')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
