<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDescriptionsProductsTable extends Migration
{

    public function up()
    {
        Schema::create('descriptions_products', function (Blueprint $table) {
          $table->increments('id');
          $table->string('description',200)->nullable();
          $table->float('price',8,2)->nullable();
          $table->integer('image_product_id')->unsigned()->nullable();
          $table->integer('presentation_id')->unsigned()->nullable();
          $table->foreign('image_product_id')->references('id')->on('images_products');
          $table->foreign('presentation_id')->references('id')->on('presentations');          
          $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('descriptions_products');
    }
}
