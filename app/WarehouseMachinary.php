<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WarehouseMachinary extends Model
{
  protected $table = 'warehouses_machinarys';
  protected $guarded = [
  	'id',
  	'machinery_id',
  	'sale_cost_id',  	  	
  ];
  protected $fillable = [
  	'stock',
  	'used',
  	'rented',    		
  ]; 
}
