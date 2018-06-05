<?php

namespace App\Http\Controllers;

use App\SaleCost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ControllerTransSaleCost extends Controller
{
    protected $redirectTo = 'transport/transport-sales';

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $dats = DB::table('sales_costs')->paginate(10);
        return view('SaleCost/index', ['dats' => $dats]);
    }

    public function create()
    {
        return view('SaleCost/create');
    }

    public function store(Request $request)
    {
        $insert = new SaleCost();
        $insert->cost = $request->cost;
        if($insert->save()){
            Flash('¡Ocurrio un Error en el proceso!')->success();
            return redirect()->intended('/transport/transport-sales');
        }
        else{
            Flash('¡Ocurrio un Error en el proceso!')->error();
            return redirect()->intended('/transport/transport-sales');            
        }
    }

    public function show($id)
    {
        $data = SaleCost::all()->find($id);

        if($data == null || count($data) == 0)
        {
            Flash('¡Error, no existe la información seleccionado!')->error();
            return redirect()->intended('/transport/transport-sales');
        }
        else
        {
            return view('SaleCost/view', ['data' => $data]);
        } 
    }

    public function edit($id)
    {
        $data = SaleCost::find($id);

        if($data == null || count($data) == 0)
        {
            Flash('¡Error, no existe la información seleccionado!')->error();
            return redirect()->intended('/transport/transport-sales');
        }
        else
        {
            return view('SaleCost/edit', ['data' => $data]);
        }
    }

    public function update(Request $request, $id)
    {
        $data = SaleCost::findOrFail($id);
        $data->cost = $request->cost;
        if($data->save()){
            Flash('¡La información fue creada exitosamente!')->success();
            return redirect()->intended('/transport/transport-sales');            
        }
        else{
            Flash('¡Ocurrio un Error en el proceso!')->error();
            return redirect()->intended('/transport/transport-sales');
        } 
    }

    public function destroy($id)
    {
        //
    }
}
