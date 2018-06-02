<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRolsTable extends Migration
{
    public function up()
    {
        Schema::create('rols', function (Blueprint $table) {
          $table->increments('id');
          $table->string('name',25)->unique()->nullable();
          $table->integer('button_id')->unsigned()->nullable();
          $table->integer('menu_id')->unsigned()->nullable();  
          $table->foreign('button_id')->references('id')->on('buttons')->onUpdate('cascade');
          $table->foreign('menu_id')->references('id')->on('menus')->onUpdate('cascade');      
          $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('rols');
    }
}
