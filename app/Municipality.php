<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Municipality extends Model
{
  protected $table = 'municipalitys';
  protected $guarded = [
    'id',
    'departament_id'
  ];
  protected $fillable = ['name'];


  public static function mostrarInformacion(){
    return Municipality::select('id', 'name')->orderBy('name', 'asc')->get();
  }  
  
  public static function buscar($id){
    return Municipality::where('departament_id', $id)->orderBy('name', 'asc')->get();
  }
}
