<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
    //Falta
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('dpi', 13);
            $table->string('first_name',50);
            $table->string('second_name',50)->nullable();
            $table->string('first_last_name',50);
            $table->string('second_last_name',50)->nullable();  
            $table->string('direction',150);   
            $table->date('date_birth')->nullable();
            $table->integer('phone');   
            $table->integer('municipality_id')->unsigned();
            $table->foreign('municipality_id')->references('id')->on('municipalitys')->onUpdate('cascade');      
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('customers');
    }
}
