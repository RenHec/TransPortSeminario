<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UnitMeasurement extends Model
{
  protected $table = 'units_measurements';
  protected $guarded = [
  	'id',
  ];
  protected $fillable = [
  	'name',
  	'abbreviation',
  ]; 

  public static function mostrarInformacion(){
    return UnitMeasurement::select('id', 'name', 'abbreviation')->orderBy('name', 'asc')->get();
  }    
}
