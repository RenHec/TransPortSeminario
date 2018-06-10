<?php

namespace App\Http\Controllers;

use App\WarehouseMachinary;
use App\Category;
use App\SaleCost;
use App\Machinery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;

class ControllerTransPortCatalogo extends Controller
{
    public function index()
    { 
        $dats = DB::table('warehouses_machinarys')
                    ->join('machinerys', 'warehouses_machinarys.machinery_id', 'machinerys.id')
                    ->join('sales_costs', 'warehouses_machinarys.sale_cost_id', 'sales_costs.id')
                    ->select('warehouses_machinarys.*', 'machinerys.name as machinery', 'machinerys.model as model', 'machinerys.km as km', 'machinerys.description as description', 'machinerys.photo as photo', 'sales_costs.cost as sale_cost')
                    ->get();
        return view('catalogo', ['dats' => $dats]);
    }
}
