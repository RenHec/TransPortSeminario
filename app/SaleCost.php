<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SaleCost extends Model
{
	protected $table = 'sales_costs';
	protected $guarded = [
	  'id'
	];

	protected $fillable = [
	  'cost',   
	]; 	
}
