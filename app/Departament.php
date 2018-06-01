<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Departament extends Model
{
  protected $table = 'departaments';
  protected $guarded = ['id'];
  protected $fillable = ['name'];
}
