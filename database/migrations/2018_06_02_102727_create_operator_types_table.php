<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOperatorTypesTable extends Migration
{
    public function up()
    {
        Schema::create('operator_types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 50)->unique();
            $table->char('type_license', 1)->nullable();               
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('operator_types');
    }
}
