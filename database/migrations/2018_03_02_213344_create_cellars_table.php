<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCellarsTable extends Migration
{

    public function up()
    {
        Schema::create('cellars', function (Blueprint $table) {
          $table->increments('id');
    	    $table->date('date')->nullable();
    	    $table->string('lot',25)->nullable();
    	    $table->string('pf',25)->nullable();
    	    $table->integer('quantity')->nullable();
    	    $table->integer('description_product_product_id')->unsigned()->nullable();
          $table->foreign('description_product_product_id')->references('id')->on('descriptions_products');
          $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('cellars');
    }
}
