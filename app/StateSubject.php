<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StateSubject extends Model
{
  protected $table = 'states_subjects';
  protected $guarded = [
  	'id',
  ];
  protected $fillable = [
  	'name',
  ]; 

  public static function mostrarInformacion(){
    return StateSubject::select('id', 'name')->orderBy('name', 'asc')->get();
  }    
}
