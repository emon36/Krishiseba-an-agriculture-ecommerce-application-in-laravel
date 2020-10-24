<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHelplinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('helplines', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->string('name');
            $table->string('phone_no');
            $table->bigInteger('division_id')->unsigned();
            $table->bigInteger('district_id')->unsigned();
            $table->bigInteger('sub_district_id')->unsigned();
            $table->bigInteger('union_id')->unsigned();
            $table->boolean('completed')->default(0);
            $table->string('message')->nullable();
            $table->timestamps();


            $table->foreign('user_id')
      ->references('id')->on('users')
      ->onDelete('cascade');

      $table->foreign('division_id')
      ->references('id')->on('divisions')
      ->onDelete('cascade');

      $table->foreign('district_id')
      ->references('id')->on('districts')
      ->onDelete('cascade');

   $table->foreign('sub_district_id')
      ->references('id')->on('sub_districts')
      ->onDelete('cascade');

       $table->foreign('union_id')
      ->references('id')->on('unions')
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
        Schema::dropIfExists('helplines');
    }
}
