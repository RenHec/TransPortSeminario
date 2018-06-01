<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailsSalesTable extends Migration
{

    public function up()
    {
        Schema::create('details_sales', function (Blueprint $table) {
          $table->increments('id');
    	    $table->integer('quantity')->nullable();
    	    $table->float('subtotal',8,2)->nullable();
    	    $table->integer('cellar_id')->unsigned()->nullable();
          $table->foreign('cellar_id')->references('id')->on('cellars');
          $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('details_sales');
    }
}
