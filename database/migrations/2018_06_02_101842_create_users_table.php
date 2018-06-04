<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
          $table->increments('id');
          $table->string('username',25)->unique()->nullable();
          $table->string('email',150)->unique()->nullable();
          $table->string('password')->nullable();
          $table->integer('rol_id')->unsigned()->nullable();
          $table->integer('employee_id')->unsigned()->nullable();
          $table->integer('state_id')->unsigned()->nullable();
          $table->foreign('rol_id')->references('id')->on('rols')->onUpdate('cascade');      
          $table->foreign('employee_id')->references('id')->on('employees')->onUpdate('cascade');
          $table->foreign('state_id')->references('id')->on('states')->onUpdate('cascade');      
          $table->string('token')->nullable();
          $table->rememberToken();
          $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
}
