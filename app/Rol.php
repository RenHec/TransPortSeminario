<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
  protected $table = 'rols';
  protected $guarded = ['id'];
  protected $fillable = ['name'];
}
