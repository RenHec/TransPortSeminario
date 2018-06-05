<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;
use App\User;

class PasswordResetController extends Controller
{
  protected $redirectTo = 'transport/password_reset';

  public function index()
  {
      return view('auth/Security/password_reset');
  }

  public function show($id)
  {
    $buscar_emails = DB::table('users')
                      ->join('employees', 'users.employee_id', 'employees.id')
                      ->select('users.*', 'employees.avatar as avatar')
                      ->where('users.id', '=', $id)->get();
    if($buscar_emails->count() == 1){
        $messages="";
        return view('auth/Security/password_reset', ['buscar_emails' => $buscar_emails, 'messages' => $messages]);
    }
  }

  public function store(Request $request)
  {
    $validator = Validator::make($request->all(), [
        'password' => 'required|min:8|confirmed',
    ]);

    if ($validator->fails())
    {
      Flash('¡Password Invalido!')->error();
      $messages="El password debe de contener 1 minuscula, 1 mayuscula, 1 numero, 1 simbolo y 8 caracteres";
      $buscar_emails = DB::table('users')
                        ->select('users.*')
                        ->where('username', '=', $request['username'])->get();
      if($buscar_emails->count() == 1){
          return view('auth/Security/password_reset', ['buscar_emails' => $buscar_emails, 'messages' => $messages]);
      }
    }
    else
    {
      $buscar_emails = DB::table('users')->select('id')->where('username', '=', $request['username'])->get();
      foreach ($buscar_emails as $buscar_email) {
        $id = $buscar_email->id;
      }

      $hola = "DISPROVASA-".str_random(6)."!";
      $pass = bcrypt($request['password']);

      $user = User::findOrFail($id);
      $user->password = strtoupper($pass);
      $user->token = bcrypt($hola);
      if($user->save())
      {
        Flash('¡Ingrese E-mail y Password!')->success();
        return redirect()->intended('/transport/home');
      }
    }
  }
}
