<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class CorreoBienvenidaController extends Controller
{
    public function index()
    {
      $hola = "hola";
      return view('emails/correo_bienvenida', ['hola' => $hola]);
    }
}
