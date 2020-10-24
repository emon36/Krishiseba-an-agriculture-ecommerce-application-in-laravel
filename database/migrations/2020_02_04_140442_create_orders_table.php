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
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->bigInteger('payment_id')->unsigned()->nullable();
            $table->string('ip_address')->nullable();      
            $table->string('name');
            $table->string('phone_no');
            $table->bigInteger('division_id')->unsigned();
            $table->bigInteger('district_id')->unsigned();
            $table->bigInteger('sub_district_id')->unsigned();
            $table->bigInteger('union_id')->unsigned();
            $table->boolean('paid')->default(0);
            $table->boolean('completed')->default(0);
            $table->boolean('seen')->default(0);
            $table->string('transaction_id')->nullable();

            $table->timestamps();

            $table->foreign('user_id')
      ->references('id')->on('users')
      ->onDelete('cascade');

      

     




      

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
