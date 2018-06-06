<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalesCostsTable extends Migration
{
    public function up()
    {
        Schema::create('sales_costs', function (Blueprint $table) {
            $table->increments('id');
            $table->decimal('cost', 8, 2);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('sales_costs');
    }
}
