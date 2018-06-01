<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;
use App\Binnacle;
use App\User;
use App\Rol;
use App\Departament;
use App\Municipality;
use App\Phone;
use Auth;

class UserManagementController extends Controller
{
    protected $redirectTo = 'disprovasa-sa/user-management';

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = DB::table('users')
                     ->join('rols', 'users.rol_id', 'rols.id')
                     ->select('users.*', 'rols.name as rol_name')->paginate(10);
        return view('Users/index', ['users' => $users]);
    }

    public function create()
    {
      $rols = Rol::select('id', 'name')->where('rols.id','!=','1')->get();
      $departaments = Departament::select('id', 'name')->orderBy('name', 'asc')->get();
      return view('Users/create', ['rols' => $rols, 'departaments' => $departaments]);
    }

    public function store(Request $request)
    {
      $estado_id = '1';
      $hola = "DISPROVASA-".str_random(6)."!";
      $pass = bcrypt(str_random(32));

      $file = Input::file('avatar_subir');
      $base64 = base64_encode(file_get_contents($file->path()));

      $user = new User();
      $user->dpi = strtoupper($request['dpi']);
      $user->first_name = strtoupper($request['nombre1']);
      $user->second_name = strtoupper($request['nombre2']);
      $user->first_last_name = strtoupper($request['apellido1']);
      $user->second_last_name = strtoupper($request['apellido2']);
      $user->username = strtoupper($request['username']);
      $user->email = strtoupper($request['correo']);
      $user->password = $pass;
      $user->direction = strtoupper($request['direccion']);
      $user->rol_id = $request['rol_id'];
      $user->municipality_id = $request['municipality_id'];
      $user->estado = $estado_id;
      $user->token = $hola;
      $user->avatar = "data:image/png;base64," . $base64;
      if($user->save()){
        $email = $request['correo'];
        $data = array(
          'title' => "Bienvenido",
          'user' => $request['nombre1'] ." ". $request['nombre2'] ." ". $request['apellido1'] ." ". $request['apellido2'],
          'confirmation' => "se le ha creado una cuenta en el Sistema Disprovasa, S.A. y es necesario que confirme su Correo Electrónico y el siguiente",
          'token' => "Toke: " . $hola,
          'link' => "Ingresar al Siguiente LINK:  http://127.0.0.1:8000/disprovasa-sa/confirmation_email"
        );
          Mail::send('emails.correo_bienvenida', $data, function ($message) use ($email){
              $message->subject('Confirmar Cuenta');
              $message->to($email);
          });
          Flash('¡El Usuario se creo exitosamente!')->success();
          return redirect()->intended('/disprovasa-sa/user-management');
      }
      else
      {
        Flash('¡Ocurrio un Error en el proceso!')->error();
        return redirect()->intended('/disprovasa-sa/user-management');
      }
    }

    public function show($id)
    {
      $user = User::join('rols', 'users.rol_id', 'rols.id')
                    ->join('municipalitys', 'users.municipality_id', 'municipalitys.id')
                    ->join('departaments', 'municipalitys.departament_id', 'departaments.id')
                  ->select('users.*', 'rols.name as rol_name', 'municipalitys.name as municipality_name', 'departaments.name as departament_name')
                    ->find($id);
      if($user == null || count($user) == 0)
      {
        Flash('¡Error, no existe el Usuario seleccionado!')->error();
        return redirect()->intended('/disprovasa-sa/user-management');
      }
      else
      {
        return view('Users/view', ['user' => $user]);
      }
    }

    public function edit($id)
    {
      $user = User::join('rols', 'users.rol_id', 'rols.id')
                    ->join('municipalitys', 'users.municipality_id', 'municipalitys.id')
                    ->join('departaments', 'municipalitys.departament_id', 'departaments.id')
                    ->select('users.*', 'departaments.id as departament_id')
                    ->find($id);
      if($user == null || count($user) == 0)
      {
        Flash('¡Error, no existe el Usuario seleccionado!')->error();
        return redirect()->intended('/disprovasa-sa/user-management');
      }
      else
      {
        if($user->rol_id == 1){
          $rols = Rol::select('id', 'name')->orderBy('name', 'asc')->get();
        }else{
          $rols = Rol::select('id', 'name')->where('id', '!=', '1')->orderBy('name', 'asc')->get();
        }
        $departaments = Departament::select('id', 'name')->orderBy('name', 'asc')->get();
        $municipalitys = Municipality::select('id', 'name')->orderBy('name', 'asc')->get();
        return view('Users/Edit', ['user' => $user, 'rols' => $rols, 'departaments' => $departaments, 'municipalitys' => $municipalitys]);
      }
    }

    public function update(Request $request, $id)
    {
      $pass = bcrypt($request['password']);

      $user = User::findOrFail($id);
      $user->dpi = strtoupper($request['dpi']);
      $user->first_name = strtoupper($request['nombre1']);
      $user->second_name = strtoupper($request['nombre2']);
      $user->first_last_name = strtoupper($request['apellido1']);
      $user->second_last_name = strtoupper($request['apellido2']);
      $user->username = strtoupper($request['username']);
      $user->email = strtoupper($request['correo']);
      if($request['estado'] != 0 || $request['estado'] != null){
        $user->estado = $request['estado'];
      }
      if($request['password'] != 0){
        $user->password = strtoupper($pass);
      }
      $user->direction = strtoupper($request['direccion']);
      $user->rol_id = $request['rol_id'];
      if($request['municipality_id'] != 0){
        $user->municipality_id = $request['municipality_id'];
      }

      if($user->save()){
          Flash('¡El Usuario se actualizo exitosamente!')->success();
          return redirect()->intended('/disprovasa-sa/user-management');
      }else {
        Flash('¡Ocurrio un Error en el proceso!')->error();
        return redirect()->intended('/disprovasa-sa/user-management');
      }
    }

    public function destroy($id)
    {
      $estado_id = '2';
      $user = User::findOrFail($id);
      $user->estado = $estado_id;

      if($user->save()){
          Flash('¡El Usuario se dio de baja exitosamente!')->success();
          return redirect()->intended('/disprovasa-sa/user-management');
      }else {
        Flash('¡Ocurrio un Error en el proceso!')->error();
        return redirect()->intended('/disprovasa-sa/user-management');
      }
    }

    public function search(Request $request) {
        $constraints = [
            'nombre1' => strtoupper ($request['nombre1'])
        ];
        $nombre = strtoupper($request['nombre1']);
        $users = DB::table('users')
            ->join('rols', 'users.rol_id', 'rols.id')
            ->select(DB::raw('users.id AS id, users.*, rols.name as rol_name'))
            ->whereRaw("(rols.name like '%$nombre%')")
            ->orWhereRaw("(first_name like '%$nombre%')")
            ->orWhereRaw("(second_name like '%$nombre%')")
            ->orWhereRaw("(first_last_name like '%$nombre%')")
            ->orWhereRaw("(second_last_name like '%$nombre%')")
            ->orWhereRaw("(CONCAT(first_name,' ',first_last_name) like '%$nombre%')")
            ->orWhereRaw("(CONCAT(first_name,' ',second_name) like '%$nombre%')")
            ->orWhereRaw("(CONCAT(first_last_name,' ',second_last_name) like '%$nombre%')")
            ->orWhereRaw("(CONCAT(first_name,' ',second_name,' ',first_last_name) like '%$nombre%')")
            ->orWhereRaw("(CONCAT(first_name,' ',second_name,' ',first_last_name,' ',second_last_name) like '%$nombre%')")
            ->paginate(10);
        return view('Users/index', ['users' => $users, 'searchingVals' => $constraints]);
    }


}
