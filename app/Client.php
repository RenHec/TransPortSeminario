<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
  protected $table = 'clients';
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
