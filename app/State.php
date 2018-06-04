<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
  protected $table = 'states';
  protected $guarded = [
  	'id',
  ];
  protected $fillable = [
  	'name',
  ];  

  public static function mostrarInformacion(){
    return State::select('id', 'name')->orderBy('name', 'asc')->get();
  }      
}
