<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cellar extends Model
{
  protected $table = 'cellars';
  protected $guarded = [
    'id',
    'description_product_product_id'
  ];
  protected $fillable = [
    'date',
    'lot',
    'pf',
    'quantity'
  ];
}
