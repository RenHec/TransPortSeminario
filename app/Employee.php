<?php

namespace App;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Input;

class Employee extends Model
{
    protected $table = 'employees';
    protected $guarded = [
        'id',
        'municipality_id',
        'organitation_id',
    ];
    protected $fillable = [
        'dpi',
        'first_name',
        'second_name',
        'first_last_name',
        'second_last_name',
        'date_birth',
        'direction',
        'avatar',
        'phone',
        'type_license',
        'low',
    ];


  public static function mostrarInformacion(){
    return Employee::join('organitations', 'employees.organitation_id', 'organitations.id')
              ->join('municipalitys', 'employees.municipality_id', 'municipalitys.id')
              ->join('departaments', 'municipalitys.departament_id', 'departaments.id')
              ->leftjoin('users', 'employees.id', 'users.employee_id')
              ->select('employees.*', 'municipalitys.name as municipality', 'departaments.name as departament', 'organitations.name as organitation', 'users.username as username')
              ->paginate(10);
  } 

  public static function insertInformacion(Request $request){
    $file = Input::file('avatar');
    $base64 = base64_encode(file_get_contents($file->path()));

    $insert = new Employee();
    $insert->dpi = $request->dpi;
    $insert->first_name = $request->first_name;
    $insert->second_name = $request->second_name;
    $insert->first_last_name = $request->first_last_name;
    $insert->second_last_name = $request->second_last_name;
    $insert->date_birth = $request->date_birth;
    $insert->direction = $request->direction;
    $insert->avatar = "data:image/png;base64," . $base64;
    $insert->phone = $request->phone;
    $insert->type_license = $request->type_license;
    $insert->municipality_id = $request->municipality_id;
    $insert->organitation_id = $request->organitation_id;
    $insert->low = false;
    if($insert->save()){
      return true;
    }
  }

  public static function buscarInformacion($id){
    return Employee::where('organitation_id', $id)->orderBy('first_last_name', 'asc')->get();
  }

  public static function seleccionarRegistro($id){
    return Employee::join('organitations', 'employees.organitation_id', 'organitations.id')
              ->join('municipalitys', 'employees.municipality_id', 'municipalitys.id')
              ->join('departaments', 'municipalitys.departament_id', 'departaments.id')
              ->leftjoin('users', 'employees.id', 'users.employee_id')
              ->select('employees.*', 'municipalitys.id as municipality_id', 'departaments.id as departament_id', 'organitations.id as organitation_id', 'users.username as username')->find($id);
  } 

  public static function seleccionarVerRegistro($id){
    return Employee::join('organitations', 'employees.organitation_id', 'organitations.id')
              ->join('municipalitys', 'employees.municipality_id', 'municipalitys.id')
              ->join('departaments', 'municipalitys.departament_id', 'departaments.id')
              ->leftjoin('users', 'employees.id', 'users.employee_id')
              ->select('employees.*', 'municipalitys.name as municipality', 'departaments.name as departament', 'organitations.name as organitation', 'users.username as username')->find($id);
  }   

  public static function actualizarRegistro(Request $request, $id){
            dd($request->all());
    $insert = Employee::findOrFail($id);
    $insert->dpi = $request->dpi;
    $insert->first_name = $request->first_name;
    $insert->second_name = $request->second_name;
    $insert->first_last_name = $request->first_last_name;
    $insert->second_last_name = $request->second_last_name;
    $insert->date_birth = $request->date_birth;
    $insert->direction = $request->direction;
    if($request->editFoto == 1){
      $file = Input::file('avatar_edit');
      $base64 = base64_encode(file_get_contents($file->path()));
      $insert->avatar = "data:image/png;base64," . $base64;
    }
    $insert->phone = $request->phone;
    $insert->type_license = $request->type_license;
    $insert->municipality_id = $request->municipality_id;
    $insert->organitation_id = $request->organitation_id;
    $insert->low = false;
    if($insert->save()){
      return true;
    }
  }

  public static function debajaRegistro($id){
      
      $data = Employee::findOrFail($id);
      
      if($data->low == false){
        $data->low = true;
      }else{
        $data->low = false;
      }

      if($data->save()){
          return true;
      }   
  } 
}
