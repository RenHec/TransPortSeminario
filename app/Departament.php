<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Departament extends Model
{
  protected $table = 'departaments';
  protected $guarded = ['id'];
  protected $fillable = ['name'];

  public static function mostrarInformacion(){
    return Departament::select('id', 'name')->orderBy('name', 'asc')->get();
  }   
}
