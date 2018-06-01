<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBinnaclesTable extends Migration
{

    public function up()
    {
        Schema::create('binnacles', function (Blueprint $table) {
          $table->increments('id');
          $table->string('username',25)->nullable();
          $table->string('description',1000)->nullable();
          $table->string('table',25)->nullable();
          $table->string('action',25)->nullable();
          $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('binnacles');
    }
}
