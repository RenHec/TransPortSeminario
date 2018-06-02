<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStatesSubjectsTable extends Migration
{
    public function up()
    {
        Schema::create('states_subjects', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 50)->unique()->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('states_subjects');
    }
}
