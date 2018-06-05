<?php

namespace App\Http\Controllers;

use App\TypeOperator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ControllerTransTypeOperator extends Controller
{
    protected $redirectTo = 'transport/transport-typeoperator';

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $dats = DB::table('operator_types')->paginate(10);
        return view('TypeOperator/index', ['dats' => $dats]);
    }

    public function create()
    {
        return view('TypeOperator/create');
    }

    public function store(Request $request)
    {
        $insert = new TypeOperator();
        $insert->name = $request->name;
        $insert->type_license = $request->type_license;
        if($insert->save()){
            Flash('¡Ocurrio un Error en el proceso!')->success();
            return redirect()->intended('/transport/transport-typeoperator');
        }
        else{
            Flash('¡Ocurrio un Error en el proceso!')->error();
            return redirect()->intended('/transport/transport-typeoperator');            
        }
    }

    public function show($id)
    {
        $data = TypeOperator::all()->find($id);

        if($data == null || count($data) == 0)
        {
            Flash('¡Error, no existe la información seleccionado!')->error();
            return redirect()->intended('/transport/transport-typeoperator');
        }
        else
        {
            return view('TypeOperator/view', ['data' => $data]);
        } 
    }

    public function edit($id)
    {
        $data = TypeOperator::all()->find($id);

        if($data == null || count($data) == 0)
        {
            Flash('¡Error, no existe la información seleccionado!')->error();
            return redirect()->intended('/transport/transport-typeoperator');
        }
        else
        {
            return view('TypeOperator/edit', ['data' => $data]);
        } 
    }

    public function update(Request $request, $id)
    {
        $data = TypeOperator::findOrFail($id);
        $data->name = $request->name;
        $data->type_license = $request->type_license;
        if($data->save()){
            Flash('¡La información fue creada exitosamente!')->success();
            return redirect()->intended('/transport/transport-typeoperator');            
        }
        else{
            Flash('¡Ocurrio un Error en el proceso!')->error();
            return redirect()->intended('/transport/transport-typeoperator');
        } 
    }

    public function destroy($id)
    {
        //
    }
}
