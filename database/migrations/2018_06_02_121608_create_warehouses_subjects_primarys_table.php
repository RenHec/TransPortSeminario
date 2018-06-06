<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWarehousesSubjectsPrimarysTable extends Migration
{
    public function up()
    {
        Schema::create('warehouses_subjects_primarys', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('transport_materia_id')->unsigned();
            $table->foreign('transport_materia_id')->references('id')->on('transports_materias')->onUpdate('cascade');      
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('warehouses_subjects_primarys');
    }
}
