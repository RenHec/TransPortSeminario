<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Departament;
use App\Municipality;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ControllerCustomer extends Controller
{
    public function index()
    {
        $departaments = Departament::mostrarInformacion();
        return view('buscarCliente', ['departaments' => $departaments]);
    }	
    
    public function store(Request $request)
    {
        $customers = Customer::where('dpi', $request->dpi)->get();

        $datas = DB::table('warehouses_machinarys')
                    ->join('machinerys', 'warehouses_machinarys.machinery_id', 'machinerys.id')
                    ->join('sales_costs', 'warehouses_machinarys.sale_cost_id', 'sales_costs.id')
                    ->where('warehouses_machinarys.id', $request->id)
                    ->select('warehouses_machinarys.*', 'machinerys.name as machinery', 'machinerys.model as model', 'machinerys.km as km', 'machinerys.description as description', 'machinerys.photo as photo', 'sales_costs.cost as sale_cost')
                    ->get();    

        if($customers->count() > 0){
	        return view('rent', ['customers' => $customers, 'datas' => $datas]);   
        }else{
	        $departaments = Departament::mostrarInformacion();
	        return view('cliente', ['departaments' => $departaments, 'datas' => $datas]);          	
        }
    }    

    public function show($id)
    {
        $data = DB::table('warehouses_machinarys')
                    ->join('machinerys', 'warehouses_machinarys.machinery_id', 'machinerys.id')
                    ->join('sales_costs', 'warehouses_machinarys.sale_cost_id', 'sales_costs.id')
                    ->where('warehouses_machinarys.id', $id)
                    ->select('warehouses_machinarys.*', 'machinerys.name as machinery', 'machinerys.model as model', 'machinerys.km as km', 'machinerys.description as description', 'machinerys.photo as photo', 'sales_costs.cost as sale_cost')
                    ->get();    	
    	return view('buscarCliente', ['data' => $data]);
    }
}
