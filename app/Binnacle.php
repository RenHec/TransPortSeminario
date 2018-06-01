<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Binnacle extends Model
{
  protected $table = 'binnacles';
  protected $guarded = ['id'];
  protected $fillable = [
      'username',
      'description',
      'table',
      'action'
  ];
}
