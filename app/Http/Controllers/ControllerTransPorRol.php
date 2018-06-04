<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Rol;
use App\Button;
use App\Menu;
use App\RolMenuButton;
use App\Organitation;
use Auth;

class ControllerTransPorRol extends Controller
{
    protected $redirectTo = 'transport/transport-rol';

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $dats = Rol::mostrarInformacion();

        return view('Rol/index', ['dats' => $dats]);
    }

    public function create()
    {
        $buttons = Button::mostrarInformacion();
        $menus = Menu::mostrarInformacion();
        $organitations = Organitation::mostrarInformacion();

        return view('Rol/create', ['buttons' => $buttons, 'menus' => $menus, 'organitations' => $organitations]);
    }

    public function store(Request $request)
    {
        if($request->name != ""){
            $this->validateInputCRol($request);
            if(Rol::insertInformacion($request) == true){
                $buttons = Button::mostrarInformacion();
                $menus = Menu::mostrarInformacion();
                $organitations = Organitation::mostrarInformacion();
                Flash('¡La información fue creada exitosamente!')->success();  
                return view('Rol/create', ['buttons' => $buttons, 'menus' => $menus, 'organitations' => $organitations]);         
            }
            else{
                Flash('¡Ocurrio un Error en el proceso!')->error();
                return redirect()->intended('/transport/transport-rol');
            }              
        }else{
            $id = Rol::latest()->first();
            if($id != ""){
                $this->validateInputSRol($request);
                $request->name = $id->id;
                if(RolMenuButton::insertInformacion($request)){
                    $buttons = Button::mostrarInformacion();
                    $menus = Menu::mostrarInformacion();
                    $organitations = Organitation::mostrarInformacion();
                    Flash('¡La información fue creada exitosamente!')->success();  
                    return view('Rol/create', ['buttons' => $buttons, 'menus' => $menus, 'organitations' => $organitations]);           
                }
                else{
                    Flash('¡Ocurrio un Error en el proceso!')->error();
                    return redirect()->intended('/transport/transport-rol');
                }  
            }
            else{
                Flash('¡Ocurrio un Error en el proceso!')->error();
                return redirect()->intended('/transport/transport-rol');
            }                
        }      
    }

    public function show($id)
    {
        $data = Rol::seleccionarRegistro($id);

          if($data == null || count($data) == 0)
          {
            Flash('¡Error, no existe la información seleccionado!')->error();
            return redirect()->intended('/transport/transport-rol');
          }
          else
          {
            return view('Rol/view', ['data' => $data]);
          }        
    }

    public function edit($id)
    {
        $data = Rol::seleccionarRegistro($id);

          if($data == null || count($data) == 0)
          {
            Flash('¡Error, no existe la información seleccionado!')->error();
            return redirect()->intended('/transport/transport-rol');
          }
          else
          {
            $buttons = Button::mostrarInformacion();
            $menus = Menu::mostrarInformacion();
            $organitations = Organitation::mostrarInformacion();            
            return view('Rol/view', ['data' => $data, 'buttons' => $buttons, 'menus' => $menus, 
                'organitations' => $organitations]);
          }  
    }

    public function update(Request $request, $id)
    {
        if(Rol::actualizarRegistro($request, $id)){
            Flash('¡La información fue creada exitosamente!')->success();
            return redirect()->intended('/transport/transport-rol');            
        }
        else{
            Flash('¡Ocurrio un Error en el proceso!')->error();
            return redirect()->intended('/transport/transport-rol');
        }
    }

    public function search(Request $request) {
        $constraints = [
            'nombre1' => strtoupper ($request['nombre1'])
        ];

        $nombre = strtoupper($request['nombre1']);

        $dats = DB::table('rols')
            ->join('organitations', 'rols.organitation_id', 'organitations.id')
            ->select(DB::raw('rols.id AS id, rols.*, organitations.name as organitation' ))
            ->whereRaw("(rols.name like '%$nombre%')")
            ->orWhereRaw("(organitations.name like '%$nombre%')")
            ->orWhereRaw("(CONCAT(rols.name,' ',organitations.name) like '%$nombre%')")
            ->paginate(10);
        return view('Rol/index', ['dats' => $dats, 'searchingVals' => $constraints]);
    }

    private function validateInputCRol($request) {
        $this->validate($request, [
            'organitation_id' => 'nullable|required',
            'name' => 'max:30|unique:rols|required|nullable',
        ]);
    } 

    private function validateInputSRol($request) {
        $this->validate($request, [
            'button_id' => 'nullable|required',
            'menu_id' => 'nullable|required',            
        ]);
    }       
}
