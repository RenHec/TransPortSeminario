<?php

namespace App\Http\Controllers;

use App\Machinery;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class ControllerTransPorMachinery extends Controller
{
    protected $redirectTo = 'transport/transport-machinary';

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $dats = DB::table('machinerys')
                    ->join('categories', 'machinerys.category_id', 'categories.id')
                    ->select('machinerys.*', 'categories.name as category')->orderBy('categories.name', 'asc')->paginate(10);
        return view('Machinary/index', ['dats' => $dats]);
    }

    public function create()
    {
        $categories = Category::mostrarInformacion();
        return view('Machinary/create', ['categories' => $categories]);
    }

    public function store(Request $request)
    {
        $file = Input::file('avatar');
        $base64 = base64_encode(file_get_contents($file->path()));

        $insert = new Machinery();
        $insert->category_id = $request->category_id;
        $insert->name = $request->name;
        $insert->model = $request->model;
        $insert->km = $request->km;
        $insert->description = $request->description;
        $insert->photo = "data:image/png;base64," . $base64;                
        if($insert->save()){
            Flash('¡Ocurrio un Error en el proceso!')->success();
            return redirect()->intended('/transport/transport-machinary');
        }
        else{
            Flash('¡Ocurrio un Error en el proceso!')->error();
            return redirect()->intended('/transport/transport-machinary');            
        }
    }

    public function show($id)
    {
        $data = Machinery::find($id);

        if($data == null || count($data) == 0)
        {
            Flash('¡Error, no existe la información seleccionado!')->error();
            return redirect()->intended('/transport/transport-machinary');
        }
        else
        {
            $categories = Category::mostrarInformacion();          
            return view('Machinary/view', ['data' => $data, 'categories' => $categories]);
        } 
    }

    public function edit($id)
    {
        $data = Machinery::find($id);

        if($data == null || count($data) == 0)
        {
            Flash('¡Error, no existe la información seleccionado!')->error();
            return redirect()->intended('/transport/transport-machinary');
        }
        else
        {
            $categories = Category::mostrarInformacion();          
            return view('Machinary/edit', ['data' => $data, 'categories' => $categories]);
        } 
    }

    public function update(Request $request, $id)
    {        
        $insert = Machinery::findOrFail($id);
        $insert->category_id = $request->category_id;
        $insert->name = $request->name;
        $insert->model = $request->model;
        $insert->km = $request->km;
        $insert->description = $request->description;
        if($request->avatar != ""){
            $file = Input::file('avatar');
            $base64 = base64_encode(file_get_contents($file->path()));
            $insert->photo = "data:image/png;base64," . $base64;
        }
        if($insert->save()){
            Flash('¡La información fue creada exitosamente!')->success();
            return redirect()->intended('/transport/transport-machinary');            
        }
        else{
            Flash('¡Ocurrio un Error en el proceso!')->error();
            return redirect()->intended('/transport/transport-machinary');
        } 
    }

    public function destroy($id)
    {
        //
    }
}
