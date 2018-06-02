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
            $table->integer('dpi')->unique()->nullable();
            $table->string('first_name',50)->nullable();
            $table->string('second_name',50);
            $table->string('first_last_name',50)->nullable();
            $table->string('second_last_name',50);  
            $table->string('direction',150);   
            $table->date('date_birth')->nullable();
            $table->longText('avatar')->nullable(); 
            $table->integer('phone');   
            $table->char('type_license', 1);
            $table->integer('municipality_id')->unsigned()->nullable();
            $table->foreign('municipality_id')->references('id')->on('municipalitys')->onUpdate('cascade');      
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
