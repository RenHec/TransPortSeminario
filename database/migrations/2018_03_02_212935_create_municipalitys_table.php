<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMunicipalitysTable extends Migration
{

    public function up()
    {
        Schema::create('municipalitys', function (Blueprint $table) {
          $table->increments('id');
          $table->string('name',50)->nullable();
          $table->integer('departament_id')->unsigned()->nullable();
          $table->foreign('departament_id')->references('id')->on('departaments');
          $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('municipalitys');
    }
}
