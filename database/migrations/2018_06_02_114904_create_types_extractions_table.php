<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTypesExtractionsTable extends Migration
{
    public function up()
    {
        Schema::create('types_extractions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 50)->unique()->nullable();
            $table->integer('state_subject_id')->unsigned()->nullable(); 
            $table->integer('unit_measurement_id')->unsigned()->nullable();
            $table->foreign('state_subject_id')->references('id')->on('states_subjects')->onUpdate('cascade');      
            $table->foreign('unit_measurement_id')->references('id')->on('units_measurements')->onUpdate('cascade');      
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('types_extractions');
    }
}
