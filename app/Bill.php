<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
  protected $table = 'bills';
  protected $guarded = [
    'id',
    'client_id',
    'payment_id'
  ];
  protected $fillable = [
    'code',
    'date',
    'discount',
    'subtotal',
    'total',
    'quantity_letters',
  ];
}
