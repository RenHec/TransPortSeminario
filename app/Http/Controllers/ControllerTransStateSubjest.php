<?php

namespace App\Http\Controllers;

use App\StateSubject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ControllerTransStateSubjest extends Controller
{
    protected $redirectTo = 'transport/transport-statesubject';

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $dats = DB::table('states_subjects')->paginate(10);
        return view('StateSubject/index', ['dats' => $dats]);
    }

    public function create()
    {
        return view('StateSubject/create');
    }

    public function store(Request $request)
    {
        $insert = new StateSubject();
        $insert->name = $request->name;
        if($insert->save()){
            Flash('¡Ocurrio un Error en el proceso!')->success();
            return redirect()->intended('/transport/transport-statesubject');
        }
        else{
            Flash('¡Ocurrio un Error en el proceso!')->error();
            return redirect()->intended('/transport/transport-statesubject');            
        }
    }

    public function show($id)
    {
        $data = StateSubject::all()->find($id);

        if($data == null || count($data) == 0)
        {
            Flash('¡Error, no existe la información seleccionado!')->error();
            return redirect()->intended('/transport/transport-statesubject');
        }
        else
        {
            return view('StateSubject/view', ['data' => $data]);
        } 
    }

    public function edit($id)
    {
        $data = StateSubject::all()->find($id);

        if($data == null || count($data) == 0)
        {
            Flash('¡Error, no existe la información seleccionado!')->error();
            return redirect()->intended('/transport/transport-statesubject');
        }
        else
        {
            return view('StateSubject/edit', ['data' => $data]);
        }
    }

    public function update(Request $request, $id)
    {
        $data = StateSubject::findOrFail($id);
        $insert->name = $request->name;
        $insert->abbreviation = $request->abbreviation;
        if($data->save()){
            Flash('¡La información fue creada exitosamente!')->success();
            return redirect()->intended('/transport/transport-statesubject');            
        }
        else{
            Flash('¡Ocurrio un Error en el proceso!')->error();
            return redirect()->intended('/transport/transport-statesubject');
        } 
    }

    public function destroy($id)
    {
        //
    }
}
