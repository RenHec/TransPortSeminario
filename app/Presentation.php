<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Presentation extends Model
{
  protected $table = 'presentations';
  protected $guarded = ['id'];
  protected $fillable = ['name'];
}
