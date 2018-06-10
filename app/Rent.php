<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rent extends Model
{
  protected $table = 'rents';
  protected $guarded = [
  	'id',
  	'warehous_machinary_id',
  	'customer_id',
  ];
  protected $fillable = [
  	'quantity',
  	'hour',
  	'date_return',  	  	
  ]; 
}
