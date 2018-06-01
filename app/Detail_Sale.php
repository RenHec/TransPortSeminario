<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detail_Sale extends Model
{
  protected $table = 'details_sales';
  protected $guarded = [
    'id',
    'cellar_id'
  ];
  protected $fillable = [
    'quantity',
    'subtotal'
  ];
}
