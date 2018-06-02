<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Organitation extends Model
{
  protected $table = 'organitations';
  protected $guarded = [
  	'id',
  	'municipality_id',
  	'rol_id'
  ];
}
