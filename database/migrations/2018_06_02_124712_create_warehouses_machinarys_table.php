<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWarehousesMachinarysTable extends Migration
{
    public function up()
    {
        Schema::create('warehouses_machinarys', function (Blueprint $table) {
            $table->increments('id');
            $table->smallInteger('stock');
            $table->smallInteger('used');
            $table->smallInteger('rented');
            $table->boolean('existence');
            $table->integer('machinery_id')->unsigned()->unique();
            $table->integer('sale_cost_id')->unsigned();
            $table->foreign('machinery_id')->references('id')->on('machinerys')->onUpdate('cascade');      
            $table->foreign('sale_cost_id')->references('id')->on('sales_costs')->onUpdate('cascade');      
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('warehouses_machinarys');
    }
}
