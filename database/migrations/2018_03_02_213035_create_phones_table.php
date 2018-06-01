<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhonesTable extends Migration
{

    public function up()
    {
        Schema::create('phones', function (Blueprint $table) {
          $table->increments('id');
          $table->string('cell_phone',12)->nullable();
          $table->integer('company_id')->unsigned()->nullable();
          $table->foreign('company_id')->references('id')->on('companys');
          $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('phones');
    }
}
