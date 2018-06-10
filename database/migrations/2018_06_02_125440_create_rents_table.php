<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRentsTable extends Migration
{
    public function up()
    {
        Schema::create('rents', function (Blueprint $table) {
            $table->increments('id');
            $table->smallInteger('quantity');
            $table->smallInteger('hour');
            $table->dateTime('date_return');
            $table->integer('warehous_machinary_id')->unsigned();
            $table->integer('customer_id')->unsigned();
            $table->foreign('warehous_machinary_id')->references('id')->on('warehouses_machinarys')->onUpdate('cascade');    
            $table->foreign('customer_id')->references('id')->on('customers')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('rents');
    }
}
