<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Municipality;
use App\Departament;
use App\Organitation;
use App\Employee;
use Auth;

class ControllerTransPorEmployee extends Controller
{
    protected $redirectTo = 'transport/transport-employee';

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $dats = Employee::mostrarInformacion();

        return view('Employee/index', ['dats' => $dats]);
    }

    public function create()
    {
        $departaments = Departament::mostrarInformacion();
        $organitations = Organitation::mostrarInformacion();

        return view('Employee/create', ['organitations' => $organitations, 'departaments' => $departaments]);   
    }

    public function store(Request $request)
    {
        if($request->phone == ""){
            $this->validateInput($request, 2);
        }else{
            $this->validateInput($request, 1);
        }

        if(Employee::insertInformacion($request) == true){
            Flash('¡La información fue creada exitosamente!')->success();
            return redirect()->intended('/transport/transport-employee');            
        }
        else{
            Flash('¡Ocurrio un Error en el proceso!')->error();
            return redirect()->intended('/transport/transport-employee');
        }
    }

    public function show($id)
    {
        $data = Employee::seleccionarVerRegistro($id);

        if($data == null || count($data) == 0)
        {
            Flash('¡Error, no existe la información seleccionado!')->error();
            return redirect()->intended('/transport/transport-employee');
        }
        else
        {
            return view('Employee/view', ['data' => $data]);
        }         
    }

    public function edit($id)
    {
        $data = Employee::seleccionarRegistro($id);

        if($data == null || count($data) == 0)
        {
            Flash('¡Error, no existe la información seleccionado!')->error();
            return redirect()->intended('/transport/transport-employee');
        }
        else
        {
            $departaments = Departament::mostrarInformacion();
            $organitations = Organitation::mostrarInformacion();
            $municipalitys = Municipality::mostrarInformacion();

            return view('Employee/edit', ['organitations' => $organitations, 'departaments' => $departaments, 'municipalitys' => $municipalitys, 'data' => $data]);
        }  
    }

    public function update(Request $request, $id)
    {
        if($request->phone == ""){
            $this->validateInput($request, 4);
        }else{
            $this->validateInput($request, 3);
        }    

        if(Employee::actualizarRegistro($request, $id) == true){
            Flash('¡La información fue modificada exitosamente!')->success();
            return redirect()->intended('/transport/transport-employee');            
        }
        else{
            Flash('¡Ocurrio un Error en el proceso!')->error();
            return redirect()->intended('/transport/transport-employee');
        }
    }

    public function destroy($id)
    {

        if(User::debajaRegistro($id, 2)){
          if(Employee::debajaRegistro($id)){
              Flash('¡El registro se dio de baja exitosamente!')->success();
              return redirect()->intended('/transport/transport-employee');
          }else {
            Flash('¡Ocurrio un Error en el proceso!')->error();
            return redirect()->intended('/transport/transport-employee');
          }            
        }else {
            Flash('¡Ocurrio un Error en el proceso!')->error();
            return redirect()->intended('/transport/transport-employee');
        }  
    }

    private function validateInput($request, $posicion) {

        if($posicion == 1){
            $this->validate($request, [
                'dpi' => 'min:13|unique:employees|nullable|required',
                'first_name' => 'max:50|nullable|required',
                'second_name' => 'max:50',
                'first_last_name' => 'max:50|nullable|required',
                'second_last_name' => 'max:50',
                'direction' => 'max:150',  
                'date_birth' => 'date|nullable|required',
                'avatar' => 'nullable|required',  
                'phone' => 'min:8|numeric',
                'type_license' => 'max:1|nullable|required|string', 
                'municipality_id' => 'nullable|required',  
                'organitation_id' => 'nullable|required',       
            ]);            
        }

        if($posicion == 2){
            $this->validate($request, [
                'dpi' => 'max:13|min:13|unique:employees|nullable|required',
                'first_name' => 'max:50|nullable|required',
                'second_name' => 'max:50',
                'first_last_name' => 'max:50|nullable|required',
                'second_last_name' => 'max:50',
                'direction' => 'max:150',  
                'date_birth' => 'date|nullable|required',
                'avatar' => 'nullable|required',  
                'type_license' => 'max:1|nullable|required|string', 
                'municipality_id' => 'nullable|required',  
                'organitation_id' => 'nullable|required',       
            ]);            
        }  

        if($posicion == 3){
            if($request->editCUI == 1 && $request->editFoto == 1){
                $this->validate($request, [
                    'dpi' => 'min:13|unique:employees|nullable|required',
                    'first_name' => 'max:50|nullable|required',
                    'second_name' => 'max:50',
                    'first_last_name' => 'max:50|nullable|required',
                    'second_last_name' => 'max:50',
                    'direction' => 'max:150',  
                    'date_birth' => 'date|nullable|required',
                    'avatar' => 'nullable|required',  
                    'phone' => 'min:8|numeric',
                    'type_license' => 'max:1|nullable|required|string', 
                    'municipality_id' => 'nullable|required',  
                    'organitation_id' => 'nullable|required',       
                ]);   
            }   

            if($request->editCUI == 1){
                $this->validate($request, [
                    'dpi' => 'min:13|unique:employees|nullable|required',
                    'first_name' => 'max:50|nullable|required',
                    'second_name' => 'max:50',
                    'first_last_name' => 'max:50|nullable|required',
                    'second_last_name' => 'max:50',
                    'direction' => 'max:150',  
                    'date_birth' => 'date|nullable|required', 
                    'phone' => 'min:8|numeric',
                    'type_license' => 'max:1|nullable|required|string', 
                    'municipality_id' => 'nullable|required',  
                    'organitation_id' => 'nullable|required',       
                ]);   
            } 

            if($request->editFoto == 1){
                dd($request->all());
                $this->validate($request, [
                    'first_name' => 'max:50|nullable|required',
                    'second_name' => 'max:50',
                    'first_last_name' => 'max:50|nullable|required',
                    'second_last_name' => 'max:50',
                    'direction' => 'max:150',  
                    'date_birth' => 'date|nullable|required',
                    'avatar' => 'nullable|required',  
                    'phone' => 'min:8|numeric',
                    'type_license' => 'max:1|nullable|required|string', 
                    'municipality_id' => 'nullable|required',  
                    'organitation_id' => 'nullable|required',       
                ]);   
            }              

            else{
                $this->validate($request, [
                    'first_name' => 'max:50|nullable|required',
                    'second_name' => 'max:50',
                    'first_last_name' => 'max:50|nullable|required',
                    'second_last_name' => 'max:50',
                    'direction' => 'max:150',  
                    'date_birth' => 'date|nullable|required', 
                    'phone' => 'min:8|numeric',
                    'type_license' => 'max:1|nullable|required|string', 
                    'municipality_id' => 'nullable|required',  
                    'organitation_id' => 'nullable|required',       
                ]);   
            }                  
        }

        if($posicion == 4){
            if($request->editCUI == 1 && $request->editFoto == 1){
                $this->validate($request, [
                    'dpi' => 'min:13|unique:employees|nullable|required',
                    'first_name' => 'max:50|nullable|required',
                    'second_name' => 'max:50',
                    'first_last_name' => 'max:50|nullable|required',
                    'second_last_name' => 'max:50',
                    'direction' => 'max:150',  
                    'date_birth' => 'date|nullable|required',
                    'avatar' => 'nullable|required',  
                    'type_license' => 'max:1|nullable|required|string', 
                    'municipality_id' => 'nullable|required',  
                    'organitation_id' => 'nullable|required',       
                ]);   
            }   

            if($request->editCUI == 1){
                $this->validate($request, [
                    'dpi' => 'min:13|unique:employees|nullable|required',
                    'first_name' => 'max:50|nullable|required',
                    'second_name' => 'max:50',
                    'first_last_name' => 'max:50|nullable|required',
                    'second_last_name' => 'max:50',
                    'direction' => 'max:150',  
                    'date_birth' => 'date|nullable|required', 
                    'type_license' => 'max:1|nullable|required|string', 
                    'municipality_id' => 'nullable|required',  
                    'organitation_id' => 'nullable|required',       
                ]);   
            } 

            if($request->editFoto == 1){
                $this->validate($request, [
                    'first_name' => 'max:50|nullable|required',
                    'second_name' => 'max:50',
                    'first_last_name' => 'max:50|nullable|required',
                    'second_last_name' => 'max:50',
                    'direction' => 'max:150',  
                    'date_birth' => 'date|nullable|required',
                    'avatar' => 'nullable|required',  
                    'type_license' => 'max:1|nullable|required|string', 
                    'municipality_id' => 'nullable|required',  
                    'organitation_id' => 'nullable|required',       
                ]);   
            }              

            else{
                $this->validate($request, [
                    'first_name' => 'max:50|nullable|required',
                    'second_name' => 'max:50',
                    'first_last_name' => 'max:50|nullable|required',
                    'second_last_name' => 'max:50',
                    'direction' => 'max:150',  
                    'date_birth' => 'date|nullable|required', 
                    'type_license' => 'max:1|nullable|required|string', 
                    'municipality_id' => 'nullable|required',  
                    'organitation_id' => 'nullable|required',       
                ]);   
            }                        
        }                       
    }     
}
