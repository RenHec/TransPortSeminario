<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequestsSubjectsTable extends Migration
{
    public function up()
    {
        Schema::create('requests_subjects', function (Blueprint $table) {
            $table->increments('id');
            $table->decimal('quantity', 11, 2);
            $table->integer('employee_id')->unsigned();
            $table->integer('warehouse_subject_primary_id')->unsigned();            
            $table->foreign('employee_id')->references('id')->on('employees')->onUpdate('cascade');
            $table->foreign('warehouse_subject_primary_id')->references('id')->on('warehouses_subjects_primarys')->onUpdate('cascade');      
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('requests_subjects');
    }
}
