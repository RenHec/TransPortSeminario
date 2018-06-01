<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image_Product extends Model
{
  protected $table = 'images_products';
  protected $guarded = [
    'id',
    'product_id',
    'image_id'
  ];
}
