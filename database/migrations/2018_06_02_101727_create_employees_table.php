<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesTable extends Migration
{
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->increments('id');
            $table->string('dpi',13);
            $table->string('first_name',50);
            $table->string('second_name',50)->nullable();
            $table->string('first_last_name',50);
            $table->string('second_last_name',50)->nullable();  
            $table->string('direction',150)->nullable();   
            $table->date('date_birth');
            $table->longText('avatar'); 
            $table->integer('phone');   
            $table->char('type_license', 1); 
            $table->integer('municipality_id')->unsigned();
            $table->foreign('municipality_id')->references('id')->on('municipalitys')->onUpdate('cascade');   
            $table->integer('organitation_id')->unsigned();
            $table->foreign('organitation_id')->references('id')->on('organitations')->onUpdate('cascade');      
            $table->boolean('low')->nullable();            
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
