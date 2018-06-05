<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ControllerTransCategory extends Controller
{
    protected $redirectTo = 'transport/transport-category';

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $dats = DB::table('categories')->paginate(10);

        return view('Category/index', ['dats' => $dats]);
    }

    public function create()
    {
        return view('Category/create');
    }

    public function store(Request $request)
    {
        $insert = new Category();
        $insert->name = $request->name;
        if($insert->save()){
            Flash('¡Ocurrio un Error en el proceso!')->success();
            return redirect()->intended('/transport/transport-category');
        }
        else{
            Flash('¡Ocurrio un Error en el proceso!')->error();
            return redirect()->intended('/transport/transport-category');            
        }
    }

    public function show($id)
    {
        $data = Category::all()->find($id);

        if($data == null || count($data) == 0)
        {
            Flash('¡Error, no existe la información seleccionado!')->error();
            return redirect()->intended('/transport/transport-category');
        }
        else
        {
            return view('Category/view', ['data' => $data]);
        } 
    }

    public function edit($id)
    {
        $data = Category::all()->find($id);

        if($data == null || count($data) == 0)
        {
            Flash('¡Error, no existe la información seleccionado!')->error();
            return redirect()->intended('/transport/transport-category');
        }
        else
        {
            return view('Category/edit', ['data' => $data]);
        }
    }

    public function update(Request $request, $id)
    {
        $data = Category::findOrFail($id);
        $data->name = $request->name;
        if($data->save()){
            Flash('¡La información fue creada exitosamente!')->success();
            return redirect()->intended('/transport/transport-category');            
        }
        else{
            Flash('¡Ocurrio un Error en el proceso!')->error();
            return redirect()->intended('/transport/transport-category');
        } 
    }

    public function destroy($id)
    {
        //
    }
}
