<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->Integer('category_id')->unsigned();
            $table->Integer('Sub_category_id')->unsigned();
            $table->string('slug');
            $table->string('img')->nullable();
            $table->string('price');
            $table->Integer('Quantity')->default(1);
            $table->text('description');
            $table->text('small_description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
