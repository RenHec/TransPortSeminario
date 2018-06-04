<?php

namespace App;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
  protected $table = 'rols';
  protected $guarded = [
  	'id',
  	'organitation_id',
  ];

  protected $fillable = [
    'name',   
  ]; 

  public static function mostrarInformacion(){
    return Rol::join('organitations', 'rols.organitation_id', 'organitations.id')
              ->select('rols.*', 'organitations.name as organitation')
              ->paginate(10);
  } 

  public static function insertInformacion(Request $request){
    $insert = new Rol();
    $insert->name = $request->name;
    $insert->organitation_id = $request->organitation_id;
    if($insert->save()){
      return true;
    }
  }

  public static function buscarInformacion($id){
    return Rol::where('organitation_id', $id)->orderBy('name', 'asc')->get();
  }

  public static function seleccionarRegistro($id){
    return Rol::join('organitations', 'rols.organitation_id', 'organitations.id')
              ->select('rols.*', 'organitations.name as organitation')->find($id);
  }  

  public static function actualizarRegistro(Request $request, $id){

    $insert = Rol::findOrFail($id);

    $insert->name = $request->name;
    $insert->organitation_id = $request->organitation_id;
    $insert->save();
  }
}
