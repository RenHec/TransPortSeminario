<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
  protected $table = 'companys';
  protected $guarded = ['id'];
  protected $fillable = ['name'];
}
