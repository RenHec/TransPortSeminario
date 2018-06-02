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
            $table->smallInteger('quantity')->nullable();
            $table->smallInteger('hour')->nullable();
            $table->dateTime('date_return')->nullable();
            $table->integer('warehous_machinary_id')->unsigned()->nullable();
            $table->foreign('warehous_machinary_id')->references('id')->on('warehouses_machinarys')->onUpdate('cascade');      
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('rents');
    }
}
