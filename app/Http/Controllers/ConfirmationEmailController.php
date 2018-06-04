<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use User;

class ConfirmationEmailController extends Controller
{
  protected $redirectTo = 'transport/confirmation_email';

  public function index()
  {
      return view('auth/Security/confirmation_email');
  }

  public function store(Request $request)
  {
      $buscar_emails = DB::table('users')
                        ->select('users.*')
                        ->where('email', '=', $request['email'])
                        ->where('token', '=', $request['token'])->get();
      if($buscar_emails->count() == 1){
        foreach($buscar_emails as $buscar_email){
          return redirect()->route('password_reset.show', ['id' => $buscar_email->id]);
        }
      }else {
        Flash('¡Error en la Confirmacion de Email!')->error();
        return redirect()->intended('/transport/confirmation_email');
      }      
  }
}
