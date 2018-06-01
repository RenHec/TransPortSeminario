<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImagesProductsTable extends Migration
{

    public function up()
    {
        Schema::create('images_products', function (Blueprint $table) {
          $table->increments('id');
          $table->longText('image');          
          $table->integer('product_id')->unsigned()->nullable();
          $table->foreign('product_id')->references('id')->on('products');
          $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('images_products');
    }
}
