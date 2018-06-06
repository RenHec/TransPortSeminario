<?php

namespace App\Http\Controllers;

use App\UnitMeasurement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ControllerTransUnitMeasurement extends Controller
{
    protected $redirectTo = 'transport/transport-measurement';

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $dats = DB::table('units_measurements')->paginate(10);
        return view('Measurement/index', ['dats' => $dats]);
    }

    public function create()
    {
        return view('Measurement/create');
    }

    public function store(Request $request)
    {
        $insert = new UnitMeasurement();
        $insert->name = $request->name;
        $insert->abbreviation = $request->abbreviation;
        if($insert->save()){
            Flash('¡Ocurrio un Error en el proceso!')->success();
            return redirect()->intended('/transport/transport-measurement');
        }
        else{
            Flash('¡Ocurrio un Error en el proceso!')->error();
            return redirect()->intended('/transport/transport-measurement');            
        }
    }

    public function show($id)
    {
        $data = UnitMeasurement::all()->find($id);

        if($data == null || count($data) == 0)
        {
            Flash('¡Error, no existe la información seleccionado!')->error();
            return redirect()->intended('/transport/transport-measurement');
        }
        else
        {
            return view('Measurement/view', ['data' => $data]);
        } 
    }

    public function edit($id)
    {
        $data = UnitMeasurement::all()->find($id);

        if($data == null || count($data) == 0)
        {
            Flash('¡Error, no existe la información seleccionado!')->error();
            return redirect()->intended('/transport/transport-measurement');
        }
        else
        {
            return view('Measurement/edit', ['data' => $data]);
        }
    }

    public function update(Request $request, $id)
    {
        $data = UnitMeasurement::findOrFail($id);
        $data->name = $request->name;
        $data->abbreviation = $request->abbreviation;
        if($data->save()){
            Flash('¡La información fue creada exitosamente!')->success();
            return redirect()->intended('/transport/transport-measurement');            
        }
        else{
            Flash('¡Ocurrio un Error en el proceso!')->error();
            return redirect()->intended('/transport/transport-measurement');
        } 
    }

    public function destroy($id)
    {
        //
    }
}
