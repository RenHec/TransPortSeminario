<?php

namespace App\Http\Controllers;

use App\WarehouseMachinary;
use App\Category;
use App\SaleCost;
use App\Machinery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;

class ControllerTransPortWarehouseMachinary extends Controller
{
    protected $redirectTo = 'transport/transport-warehousemachinary';

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $dats = DB::table('warehouses_machinarys')
                    ->join('machinerys', 'warehouses_machinarys.machinery_id', 'machinerys.id')
                    ->join('sales_costs', 'warehouses_machinarys.sale_cost_id', 'sales_costs.id')
                    ->select('warehouses_machinarys.*', 'machinerys.name as machinery', 'machinerys.model as model', 'machinerys.km as km', 'machinerys.description as description', 'machinerys.photo as photo', 'sales_costs.cost as sale_cost')
                    ->paginate(10);
        return view('WarehouseMachinary/index', ['dats' => $dats]);
    }

    public function create()
    {
        $sales_costs = SaleCost::select('id', 'cost')->get();
        $categories = Category::mostrarInformacion();
        return view('WarehouseMachinary/create', ['sales_costs' => $sales_costs, 'categories' => $categories]);
    }

    public function store(Request $request)
    {
        $insert = new WarehouseMachinary();
        $insert->machinery_id = $request->machinery_id;
        $insert->sale_cost_id = $request->sale_cost_id;
        $insert->stock = $request->stock;
        $insert->used = 0;
        $insert->rented = 0;                   
        if($insert->save()){
            Flash('¡Se agrego correctament!')->success();
            return redirect()->intended('/transport/transport-warehousemachinary');
        }
        else{
            Flash('¡Ocurrio un Error en el proceso!')->error();
            return redirect()->intended('/transport/transport-warehousemachinary');            
        }
    }

    public function show($id)
    {
        $data = WarehouseMachinary::all()->find($id);

        if($data == null || count($data) == 0)
        {
            Flash('¡Error, no existe la información seleccionado!')->error();
            return redirect()->intended('/transport/transport-warehousemachinary');
        }
        else
        {
            $sales_costs = SaleCost::select('id', 'cost')->get();
            $categories = Category::mostrarInformacion();
            $machinerys = Machinery::mostrarInformacion();
            return view('WarehouseMachinary/view', ['data' => $data, 'sales_costs' => $sales_costs, 'categories' => $categories, 'machinerys' => $machinerys]);
        } 
    }

    public function edit($id)
    {
        $data = WarehouseMachinary::all()->find($id);

        if($data == null || count($data) == 0)
        {
            Flash('¡Error, no existe la información seleccionado!')->error();
            return redirect()->intended('/transport/transport-warehousemachinary');
        }
        else
        {
            $sales_costs = SaleCost::select('id', 'cost')->get();
            $categories = Category::mostrarInformacion();
            $machinerys = Machinery::mostrarInformacion();
            return view('WarehouseMachinary/edit', ['data' => $data, 'sales_costs' => $sales_costs, 'categories' => $categories, 'machinerys' => $machinerys]);
        } 
    }

    public function update(Request $request, $id)
    {
        $insert = Operator::findOrFail($id);
        $insert->machinery_id = $request->machinery_id;
        $insert->sale_cost_id = $request->sale_cost_id;
        if($request->stock != ""){
            $insert->stock = $request->stock;
        }
        if($insert->save()){
            Flash('¡La información fue creada exitosamente!')->success();
            return redirect()->intended('/transport/transport-warehousemachinary');            
        }
        else{
            Flash('¡Ocurrio un Error en el proceso!')->error();
            return redirect()->intended('/transport/transport-warehousemachinary');
        } 
    }

    public function destroy($id)
    {
        //
    }
}
