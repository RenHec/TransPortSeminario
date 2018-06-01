<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill_Detail_Sale extends Model
{
  protected $table = 'bills_details_sales';
  protected $guarded = [
    'id',
    'bill_id',
    'detail_sale_id'
  ];
}
