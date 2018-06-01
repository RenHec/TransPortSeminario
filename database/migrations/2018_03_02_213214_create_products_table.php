<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{

    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
          $table->increments('id');
          $table->string('name')->unique()->nullable();
          $table->integer('provider_id')->unsigned()->nullable();
          $table->foreign('provider_id')->references('id')->on('providers');
          $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('products');
    }
}
