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
    return Organitation::select('id', 'name')->orderBy('name', 'asc')->get();
  }        
}
