<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTypesOperatorsCategorysTable extends Migration
{
    public function up()
    {
        Schema::create('types_operators_categorys', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('operator_type_id')->unsigned()->nullable();
            $table->foreign('operator_type_id')->references('id')->on('operator_types')->onUpdate('cascade');      
            $table->integer('category_id')->unsigned()->nullable();
            $table->foreign('category_id')->references('id')->on('categories')->onUpdate('cascade');                     
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('types_operators_categorys');
    }
}
