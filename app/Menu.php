<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = 'menus';
    protected $guarded = [
        'id',
    ];
    protected $fillable = [
        'name',
        'action',
        'id_father',                
    ];

  public static function mostrarInformacion(){
    return Menu::select('id', 'name')->orderBy('name', 'asc')->get();
  }    
}
