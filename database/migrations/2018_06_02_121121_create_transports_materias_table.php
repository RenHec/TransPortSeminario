<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransportsMateriasTable extends Migration
{
    public function up()
    {
        Schema::create('transports_materias', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('answer')->nullable(); 
            $table->boolean('confirmed');
            $table->integer('operator_id')->unsigned()->nullable(); 
            $table->integer('extraction_id')->unsigned()->nullable();
            $table->foreign('operator_id')->references('id')->on('operator_types')->onUpdate('cascade');       
            $table->foreign('extraction_id')->references('id')->on('extractions')->onUpdate('cascade');                  
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('transports_materias');
    }
}
