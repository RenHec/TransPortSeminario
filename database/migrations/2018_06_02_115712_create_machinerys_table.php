<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMachinerysTable extends Migration
{
    public function up()
    {
        Schema::create('machinerys', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 75);
            $table->smallInteger('model');
            $table->integer('km');
            $table->string('description', 600);
            $table->longText('photo')->nullable(); 
            $table->integer('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('categories')->onUpdate('cascade');        
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('machinerys');
    }
}
