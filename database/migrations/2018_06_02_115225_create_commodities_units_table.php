<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommoditiesUnitsTable extends Migration
{
    public function up()
    {
        Schema::create('commodities_units', function (Blueprint $table) {
            $table->increments('id');
            $table->decimal('quantity', 10, 2)->nullable();
            $table->integer('type_extraction_id')->unsigned()->nullable();
            $table->integer('unit_id')->unsigned()->nullable();
            $table->foreign('type_extraction_id')->references('id')->on('types_extractions')->onUpdate('cascade');       
            $table->foreign('unit_id')->references('id')->on('units')->onUpdate('cascade');      
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('commodities_units');
    }
}
