<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsTable extends Migration
{

    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
          $table->increments('id');
          $table->string('nit')->unique()->nullable();
          $table->string('name')->nullable();
          $table->string('email')->unique()->nullable();
          $table->string('direction',150);
          $table->integer('phone_id')->unsigned()->nullable();
          $table->integer('municipality_id')->unsigned()->nullable();
          $table->foreign('phone_id')->references('id')->on('phones');
          $table->foreign('municipality_id')->references('id')->on('municipalitys');
          $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('clients');
    }
}
