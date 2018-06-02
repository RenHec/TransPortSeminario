<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrganitationsTable extends Migration
{
    public function up()
    {
        Schema::create('organitations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 60)->unique()->nullable();
            $table->string('direction', 100);
            $table->integer('municipality_id')->unsigned()->nullable();   
            $table->integer('rol_id')->unsigned()->nullable();     
            $table->foreign('municipality_id')->references('id')->on('municipalitys')->onUpdate('cascade');      
            $table->foreign('rol_id')->references('id')->on('rols')->onUpdate('cascade');      
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('organitations');
    }
}
