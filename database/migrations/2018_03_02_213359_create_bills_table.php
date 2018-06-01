<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBillsTable extends Migration
{

    public function up()
    {
        Schema::create('bills', function (Blueprint $table) {
          $table->increments('id');
    	    $table->integer('code')->nullable();
    	    $table->date('date')->nullable();
    	    $table->float('discount',8,2)->nullable();
    	    $table->float('subtotal',8,2)->nullable();
    	    $table->float('total',8,2)->nullable();
    	    $table->string('quantity_letters',500)->nullable();
    	    $table->integer('client_id')->unsigned()->nullable();
    	    $table->integer('payment_id')->unsigned()->nullable();
          $table->foreign('client_id')->references('id')->on('clients');
          $table->foreign('payment_id')->references('id')->on('payments');
          $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('bills');
    }
}
