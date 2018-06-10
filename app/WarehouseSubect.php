<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WarehouseSubect extends Model
{
  protected $table = 'warehouses_subjects_primarys';
  protected $guarded = [
  	'id',
  	'transport_materia_id'
  ];
}
