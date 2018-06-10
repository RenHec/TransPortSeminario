<?php

namespace App;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    protected $table = 'users';
    protected $guarded = [
        'id',
        'rol_id',
        'employee_id',
        'state_id',        
        'remember_token',
    ];
    protected $fillable = [
        'username',
        'email',
        'password',
        'token',
    ];
    protected $hidden = [
        'password', 'remember_token',
    ];

  public static function mostrarInformacion(){
    return User::join('employees', 'users.employee_id', 'employees.id')
              ->join('organitations', 'employees.organitation_id', 'organitations.id')
              ->join('municipalitys', 'organitations.municipality_id', 'municipalitys.id')
              ->join('rols', 'users.rol_id', 'rols.id')
              ->join('states', 'users.state_id', 'states.id')
              ->select('users.*', 'employees.first_name as first_name', 'employees.second_name as second_name', 'employees.first_last_name as first_last_name', 'employees.second_last_name as second_last_name', 'rols.name as rol', 'states.name as state', 'organitations.name as organitation', 'municipalitys.name as municipality')
              ->paginate(10);
  } 

  public static function insertInformacion(Request $request){
    $hola = "TransPort-".str_random(6)."!";

    $insert = new User();
    $insert->rol_id = $request->rol_id;
    $insert->employee_id = $request->employee_id;
    $insert->state_id = 1;
    $insert->username = $request->username;
    $insert->email = $request->email;
    $insert->password = bcrypt(str_random(32));
    $insert->remember_token = str_random(10);
    $insert->token = $hola;
    if($insert->save()){
        $email = $request->email;
        $data = array(
          'title' => "Bienvenido",
          'user' => $request->username,
          'confirmation' => "se le ha creado una cuenta en el Sistema TransPort, S.A. y es necesario que confirme su Correo Electrónico y el siguiente",
          'token' => "Toke: " . $hola,
          'link' => "Ingresar al Siguiente LINK:  http://206.81.8.65/transport/confirmation_email"
        );
        Mail::send('emails.correo_bienvenida', $data, function ($message) use ($email){
            $message->subject('Confirmar Cuenta');
            $message->to($email);
        });
        return true;
    }
  }

  public static function buscarInformacionEstado($id){
    return User::where('state_id', $id)->orderBy('username', 'asc')->get();
  }

  public static function buscarInformacionRol($id){
    return User::where('rol_id', $id)->orderBy('username', 'asc')->get();
  }  

  public static function seleccionarRegistro($id){
    return User::join('employees', 'users.employee_id', 'employees.id')
              ->join('rols', 'users.rol_id', 'rols.id')
              ->join('states', 'users.state_id', 'states.id')
              ->select('users.*', 'employees.first_name as first_name', 'employees.second_name as second_name', 'employees.first_last_name as first_last_name', 'employees.second_last_name as second_last_name', 'rols.name as rol', 'states.name as state')->find($id);
  }  

  public static function actualizarRegistro(Request $request, $id){

    $insert = User::findOrFail($id);
    
    if($request->password != ""){
        $insert->password = bcrypt($request->password);
    }

    $insert->rol_id = $request->rol_id;
    $insert->employee_id = $request->employee_id;
    $insert->username = $request->username;
    $insert->email = $request->email;
    $insert->token = $request->token;
    if($insert->save()){
      return true;
    }
  }

  public static function debajaRegistro($id, $posicion){
      
    if($posicion == 1){
      $data = User::findOrFail($id);

      if($data->state_id == 1){
        $data->state_id = 2;
        if($data->save()){
          return true;
        }  
      }
      if($data->state_id == 2){
        $data->state_id = 1;
        if($data->save()){
          return true;
        }         
      }
    }
    if($posicion == 2){
     $data = User::where('employee_id', $id);
        
      if($data->state_id == 1){
        $data->state_id = 2;
        if($data->save()){
          return true;
        }         
      }
      if($data->state_id == 2){
        $data->state_id = 1;
        if($data->save()){
          return true;
        } 
      }  
    }        
  }
}
