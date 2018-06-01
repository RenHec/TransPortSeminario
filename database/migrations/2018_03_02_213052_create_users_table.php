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
          $table->string('dpi')->unique()->nullable();
          $table->string('first_name',50)->nullable();
          $table->string('second_name',50);
          $table->string('first_last_name',50)->nullable();
          $table->string('second_last_name',50);
          $table->string('username',25)->nullable();
          $table->string('email',150)->unique()->nullable();
          $table->string('password')->nullable();
          $table->string('direction',150);
          $table->integer('rol_id')->unsigned()->nullable();
          $table->integer('municipality_id')->unsigned()->nullable();
          $table->longText('avatar')->nullable();
          $table->foreign('rol_id')->references('id')->on('rols');
          $table->foreign('municipality_id')->references('id')->on('municipalitys');
          $table->integer('estado')->nullable();
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
