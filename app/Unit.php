<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
	protected $table = 'units';
	protected $guarded = [
	  'id'
	];

	protected $fillable = [
	  'name',
	  'description',
	  'quantity_matter'   
	]; 	
}
