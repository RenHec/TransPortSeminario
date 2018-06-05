<?php

namespace App\Http\Controllers;

use App\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ControllerTransUnit extends Controller
{
    protected $redirectTo = 'transport/transport-unit';

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $dats = DB::table('units')->paginate(10);
        return view('Unit/index', ['dats' => $dats]);
    }

    public function create()
    {
        return view('Unit/create');
    }

    public function store(Request $request)
    {
        $insert = new Unit();
        $insert->name = $request->name;
        $insert->description = $request->description;
        $insert->quantity_matter = $request->quantity_matter;
        if($insert->save()){
            Flash('¡Ocurrio un Error en el proceso!')->success();
            return redirect()->intended('/transport/transport-unit');
        }
        else{
            Flash('¡Ocurrio un Error en el proceso!')->error();
            return redirect()->intended('/transport/transport-unit');            
        }
    }

    public function show($id)
    {
        $data = Unit::all()->find($id);

        if($data == null || count($data) == 0)
        {
            Flash('¡Error, no existe la información seleccionado!')->error();
            return redirect()->intended('/transport/transport-unit');
        }
        else
        {
            return view('Unit/view', ['data' => $data]);
        } 
    }

    public function edit($id)
    {
        $data = Unit::all()->find($id);

        if($data == null || count($data) == 0)
        {
            Flash('¡Error, no existe la información seleccionado!')->error();
            return redirect()->intended('/transport/transport-unit');
        }
        else
        {
            return view('Unit/edit', ['data' => $data]);
        }
    }

    public function update(Request $request, $id)
    {
        $data = Unit::findOrFail($id);
        $data->name = $request->name;
        $data->description = $request->description;
        $data->quantity_matter = $request->quantity_matter;
        if($data->save()){
            Flash('¡La información fue creada exitosamente!')->success();
            return redirect()->intended('/transport/transport-unit');            
        }
        else{
            Flash('¡Ocurrio un Error en el proceso!')->error();
            return redirect()->intended('/transport/transport-unit');
        } 
    }

    public function destroy($id)
    {
        //
    }
}
