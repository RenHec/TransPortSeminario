<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
  protected $table = 'phones';
  protected $guarded = [
    'id',
    'company_id'
  ];
  protected $fillable = ['cell_phone'];
}
