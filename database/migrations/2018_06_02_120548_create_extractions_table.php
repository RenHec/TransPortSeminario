<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExtractionsTable extends Migration
{
    public function up()
    {
        Schema::create('extractions', function (Blueprint $table) {
            $table->increments('id');
            $table->decimal('quantity', 10, 2)->nullable();
            $table->integer('operator_id')->unsigned()->nullable(); 
            $table->integer('type_extraction_id')->unsigned()->nullable();
            $table->foreign('operator_id')->references('id')->on('operator_types')->onUpdate('cascade');            
            $table->foreign('type_extraction_id')->references('id')->on('types_extractions')->onUpdate('cascade');      
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('extractions');
    }
}
