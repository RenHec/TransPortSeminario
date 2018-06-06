<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRolsMenusButtons extends Migration
{
    public function up()
    {
        Schema::create('rols_menus_buttons', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('rol_id')->unsigned(); 
            $table->integer('button_id')->unsigned();
            $table->integer('menu_id')->unsigned(); 
            $table->foreign('button_id')->references('id')->on('buttons')->onUpdate('cascade');
            $table->foreign('menu_id')->references('id')->on('menus')->onUpdate('cascade'); 
            $table->foreign('rol_id')->references('id')->on('rols')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('rols_menus_buttons');
    }
}
