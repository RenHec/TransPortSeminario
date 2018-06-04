<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class RolMenuButton extends Model
{
  protected $table = 'rols_menus_buttons';
  protected $guarded = [
  	'id',
  	'rol_id',
  	'button_id',
  	'menu_id',  	  	
  ];

  public static function insertInformacion(Request $request){

  	$buttons = $request->button_id;

  	foreach ($buttons as $button) {
  		$insert = new RolMenuButton();
	    $insert->rol_id = $request->name;
	    $insert->button_id = $button;
	    $insert->menu_id = $request->menu_id;
	    if($insert->save()){
        return true;
      }	
  	}
  }  
}
