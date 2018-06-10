<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ControllerCustomerCreate extends Controller
{
    public function store(Request $request)
    {

        $datas = DB::table('warehouses_machinarys')
                    ->join('machinerys', 'warehouses_machinarys.machinery_id', 'machinerys.id')
                    ->join('sales_costs', 'warehouses_machinarys.sale_cost_id', 'sales_costs.id')
                    ->where('warehouses_machinarys.id', $request->id)
                    ->select('warehouses_machinarys.*', 'machinerys.name as machinery', 'machinerys.model as model', 'machinerys.km as km', 'machinerys.description as description', 'machinerys.photo as photo', 'sales_costs.cost as sale_cost')
                    ->get();    

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
        	$id = Customer::latest()->first();
            $customers = Customer::find($id);
	        return view('rent', ['customers' => $customers, 'datas' => $datas]);      
        }else{

        }
    }
}
