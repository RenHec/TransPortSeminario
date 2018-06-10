<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Organitation extends Model
{
  protected $table = 'organitations';
  protected $guarded = [
  	'id',
  	'municipality_id',
  ];
  
  protected $fillable = [
    'name',
    'direction',             
  ];  

  public static function mostrarInformacion(){
    return Organitation::join('municipalitys', 'organitations.municipality_id', 'municipalitys.id')
                        ->join('departaments', 'municipalitys.departament_id', 'departaments.id')
                        ->select('organitations.id as id', 'organitations.name as name', 'municipalitys.name as municipality', 'departaments.name as departament')->orderBy('organitations.name', 'asc')->get();
  }        
}
