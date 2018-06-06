<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUnitsMeasurementsTable extends Migration
{
    public function up()
    {
        Schema::create('units_measurements', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 50)->unique();
            $table->string('abbreviation', 10);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('units_measurements');
    }
}
