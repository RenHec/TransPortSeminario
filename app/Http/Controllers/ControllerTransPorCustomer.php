<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Departament;
use App\Municipality;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ControllerTransPorCustomer extends Controller
{
    protected $redirectTo = 'transport/transport-customer';

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $dats = DB::table('customers')
                    ->join('municipalitys', 'customers.municipality_id', 'municipalitys.id')
                    ->join('departaments', 'municipalitys.departament_id', 'departaments.id')
                    ->select('customers.*', 'municipalitys.name as municipality', 'departaments.name as departament')->paginate(10);
        return view('Customer/index', ['dats' => $dats]);
    }

    public function create()
    {
        $departaments = Departament::mostrarInformacion();
        return view('Customer/create', ['departaments' => $departaments]);
    }

    public function store(Request $request)
    {
        $insert = new Customer();
        $insert->dpi = $request->dpi;
        $insert->first_name = $request->first_name;
        $insert->second_name = $request->second_name;
        $insert->first_last_name = $request->first_last_name;
        $insert->second_last_name = $request->second_last_name;
        $insert->direction = $request->direction;
        $insert->date_birth = $request->date_birth;
        $insert->phone = $request->phone;
        $insert->municipality_id = $request->municipality_id;
        if($insert->save()){
            Flash('¡Ocurrio un Error en el proceso!')->success();
            return redirect()->intended('/transport/transport-customer');
        }
        else{
            Flash('¡Ocurrio un Error en el proceso!')->error();
            return redirect()->intended('/transport/transport-customer');            
        }
    }

    public function show($id)
    {
        $data = Customer::join('municipalitys', 'customers.municipality_id', 'municipalitys.id')
                    ->join('departaments', 'municipalitys.departament_id', 'departaments.id')
                    ->select('customers.*', 'departaments.id as departament_id')->find($id);

        if($data == null || count($data) == 0)
        {
            Flash('¡Error, no existe la información seleccionado!')->error();
            return redirect()->intended('/transport/transport-customer');
        }
        else
        {
            $departaments = Departament::mostrarInformacion();
            $municipalitys = Municipality::mostrarInformacion();            
            return view('Customer/view', ['data' => $data, 'departaments' => $departaments, 'municipalitys' => $municipalitys]);
        } 
    }

    public function edit($id)
    {
        $data = Customer::join('municipalitys', 'customers.municipality_id', 'municipalitys.id')
                    ->join('departaments', 'municipalitys.departament_id', 'departaments.id')
                    ->select('customers.*', 'departaments.id as departament_id')->find($id);

        if($data == null || count($data) == 0)
        {
            Flash('¡Error, no existe la información seleccionado!')->error();
            return redirect()->intended('/transport/transport-customer');
        }
        else
        {
            $departaments = Departament::mostrarInformacion();
            $municipalitys = Municipality::mostrarInformacion();            
            return view('Customer/edit', ['data' => $data, 'departaments' => $departaments, 'municipalitys' => $municipalitys]);
        } 
    }

    public function update(Request $request, $id)
    {
        $insert = Customer::findOrFail($id);
        $insert->dpi = $request->dpi;
        $insert->first_name = $request->first_name;
        $insert->second_name = $request->second_name;
        $insert->first_last_name = $request->first_last_name;
        $insert->second_last_name = $request->second_last_name;
        $insert->direction = $request->direction;
        $insert->date_birth = $request->date_birth;
        $insert->phone = $request->phone;
        $insert->municipality_id = $request->municipality_id;
        if($insert->save()){
            Flash('¡La información fue creada exitosamente!')->success();
            return redirect()->intended('/transport/transport-customer');            
        }
        else{
            Flash('¡Ocurrio un Error en el proceso!')->error();
            return redirect()->intended('/transport/transport-customer');
        } 
    }

    public function destroy($id)
    {
        //
    }
}
