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
            $table->boolean('confirmed')->nullable();
            $table->integer('operator_id')->unsigned(); 
            $table->integer('extraction_id')->unsigned();
            $table->foreign('operator_id')->references('id')->on('operators')->onUpdate('cascade');       
            $table->foreign('extraction_id')->references('id')->on('extractions')->onUpdate('cascade');                  
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('transports_materias');
    }
}
