<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Button extends Model
{
    protected $table = 'buttons';
    protected $guarded = [
        'id',
    ];
    protected $fillable = [
        'name',
    ];

  public static function mostrarInformacion(){
    return Button::select('id', 'name')->orderBy('name', 'asc')->get();
  }      
}
