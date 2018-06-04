<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbFormulariosTable extends Migration
{
    public function up()
    {
        Schema::create('tb_formularios', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre_cliente', 75)->nullable();
            $table->string('apellido_cliente', 75)->nullable();
            $table->string('direccion', 100)->nullable();
            $table->string('telefono', 8)->nullable();
            $table->string('nit', 10)->unique()->nullable();
            $table->string('estado_civil', 10)->nullable();
            $table->boolean('status')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tb_formularios');
    }
}
