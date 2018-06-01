<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBillsDetailsSalesTable extends Migration
{

    public function up()
    {
        Schema::create('bills_details_sales', function (Blueprint $table) {
          $table->increments('id');
    	    $table->integer('bill_id')->unsigned()->nullable();
    	    $table->integer('detail_sale_id')->unsigned()->nullable();
          $table->foreign('bill_id')->references('id')->on('bills');
          $table->foreign('detail_sale_id')->references('id')->on('details_sales');
          $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('bills_details_sales');
    }
}
