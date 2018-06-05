<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypeOperator extends Model
{
	protected $table = 'operator_types';
	protected $guarded = [
	  'id'
	];

	protected $fillable = [
	  'name',  
	  'type_license',   
	]; 	
}
