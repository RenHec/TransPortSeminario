<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Description_Product extends Model
{
  protected $table = 'descriptions_products';
  protected $guarded = [
    'id',
    'image_product_id',
    'presentation_id'
  ];
  protected $fillable = [
    'description',
    'price'
  ];
}
