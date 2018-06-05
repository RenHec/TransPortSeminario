<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;
use App\Binnacle;
use App\User;
use App\Organitation;
use App\Employee;
use App\Rol;
use Auth;

class UserManagementController extends Controller
{
    protected $redirectTo = 'transport/transport-user';

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = User::mostrarInformacion();
        return view('Users/index', ['users' => $users]);
    }

    public function create()
    {
      $organitations = Organitation::mostrarInformacion();
      return view('Users/create', ['organitations' => $organitations]);
    }

    public function store(Request $request)
    {
      if(User::insertInformacion())
      {
          Flash('¡El Usuario se creo exitosamente!')->success();
          return redirect()->intended('/transport/transport-user');
      }
      else
      {
        Flash('¡Ocurrio un Error en el proceso!')->error();
        return redirect()->intended('/transport/transport-user');
      }
    }

    public function show($id)
    {
      $user = User::seleccionarRegistro($id);
      if($user == null || count($user) == 0)
      {
        Flash('¡Error, no existe el Usuario seleccionado!')->error();
        return redirect()->intended('/transport/transport-user');
      }
      else
      {
        return view('Users/view', ['user' => $user]);
      }
    }

    public function edit($id)
    {
      $user = User::seleccionarRegistro($id);
      if($user == null || count($user) == 0)
      {
        Flash('¡Error, no existe el Usuario seleccionado!')->error();
        return redirect()->intended('/transport/transport-user');
      }
      else
      {
        $organitations = Organitation::mostrarInformacion();
        $employees = Employee::buscarInformacion($organitations->id);
        $rols = Employee::buscarInformacion($organitations->id);
        return view('Users/Edit', ['user' => $user, 'organitations' => $organitations, 'employees' => $employees, 'rols' => $rols]);
      }
    }

    public function update(Request $request, $id)
    {
      if(User::actualizarRegistro($request, $id)){
          Flash('¡El Usuario se actualizo exitosamente!')->success();
          return redirect()->intended('/transport/transport-user');
      }else {
        Flash('¡Ocurrio un Error en el proceso!')->error();
        return redirect()->intended('/transport/transport-user');
      }
    }

    public function destroy($id)
    {
      if(User::debajaRegistro($id, $posicion)){
          Flash('¡El Usuario se dio de baja exitosamente!')->success();
          return redirect()->intended('/transport/transport-user');
      }else {
        Flash('¡Ocurrio un Error en el proceso!')->error();
        return redirect()->intended('/transport/transport-user');
      }
    }

    public function search(Request $request) {
        $constraints = [
            'nombre1' => strtoupper ($request['nombre1'])
        ];
        $nombre = strtoupper($request['nombre1']);
        $users = DB::table('users')
            ->join('employees', 'users.employee_id', 'employees.id')
            ->join('rols', 'users.rol_id', 'rols.id')
            ->join('states', 'users.state_id', 'states.id')
            ->select(DB::raw('users.*', 'employees.first_name as first_name', 'employees.second_name as second_name', 'employees.first_last_name as first_last_name', 'employees.second_last_name as second_last_name', 'rols.name as rol', 'states.name as state'))
            ->whereRaw("(rols.name like '%$nombre%')")
            ->orWhereRaw("(employees.first_name like '%$nombre%')")
            ->orWhereRaw("(users.username like '%$nombre%')")
            ->orWhereRaw("(employees.first_last_name like '%$nombre%')")
            ->orWhereRaw("(states.name like '%$nombre%')")
            ->orWhereRaw("(CONCAT(employees.first_name,' ',employees.first_last_name) like '%$nombre%')")
            ->paginate(10);
        return view('Users/index', ['users' => $users, 'searchingVals' => $constraints]);
    }


}
