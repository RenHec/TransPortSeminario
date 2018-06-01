<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
  protected $table = 'providers';
  protected $guarded = [
    'id',
    'phone_id',
    'municipality_id'
  ];
  protected $fillable = [
    'nit',
    'name',
    'email',
    'direction'
  ];
}
