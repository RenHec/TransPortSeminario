<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOperatorsTable extends Migration
{
    public function up()
    {
        Schema::create('operators', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('employee_id')->unsigned()->nullable();
            $table->integer('machinery_id')->unsigned()->nullable();               
            $table->integer('state_id')->unsigned()->nullable();
            $table->foreign('employee_id')->references('id')->on('employees')->onUpdate('cascade');                    
            $table->foreign('machinery_id')->references('id')->on('machinerys')->onUpdate('cascade');                   
            $table->foreign('state_id')->references('id')->on('states')->onUpdate('cascade');                     
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('operators');
    }
}
