<?php

namespace App\Http\Controllers;

use App\Rent;
use App\Customer;
use App\WarehouseMachinary;
use App\Departament;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use PDF;

class ControllerTransPorRent extends Controller
{
    public function store(Request $request)
    {
        $exists = WarehouseMachinary::where('id', $request->warehous_machinary_id)->get();

        foreach ($exists as $exist) {
            $stock = $exist->stock;
            $rented = $exist->rented;
            $id = $exist->id;
        }

        $descont = WarehouseMachinary::findOrFail($id);

        if($stock > $request->quantity)
        {
            date_default_timezone_set('america/guatemala');
            $fecha  = date('Y-m-d H:i:s', (strtotime ("+".$request->hour." Hours")));

            $insert = new Rent();
            $insert->warehous_machinary_id = $request->warehous_machinary_id;
            $insert->customer_id = $request->customer_id;
            $insert->quantity = $request->quantity;
            $insert->hour = $request->hour;
            $insert->date_return = $fecha;
            if($insert->save()){
                $descont->stock = $descont->stock - $request->quantity;
                $descont->rented = $descont->rented + $request->quantity;
                $descont->save();
                $customers = Rent::latest()->first();

                $rents = $this->getExportingData($customers);
                date_default_timezone_set('america/guatemala');
                $format = 'Y-m-d H:i:s';
                $now = date($format);
                $title = 'Reporte'.$now;
                
                $pdf = PDF::loadView('Report/pdf', ['rents' => $rents, 'title' => $title]);
                return $pdf->download('renta_transport'.$now.'.pdf');
                return view('Report/pdf', ['rents' => $rents, 'title' => $title]);       
            }
        }
        else
        {
            $dats = DB::table('warehouses_machinarys')
                        ->join('machinerys', 'warehouses_machinarys.machinery_id', 'machinerys.id')
                        ->join('sales_costs', 'warehouses_machinarys.sale_cost_id', 'sales_costs.id')
                        ->select('warehouses_machinarys.*', 'machinerys.name as machinery', 'machinerys.model as model', 'machinerys.km as km', 'machinerys.description as description', 'machinerys.photo as photo', 'sales_costs.cost as sale_cost')
                        ->get();
            return view('catalogo', ['dats' => $dats]);
        }
    }


    public function exportPDF($customers) {
        $rents = $this->getExportingData($customers);
        date_default_timezone_set('america/guatemala');
        $format = 'Y-m-d H:i:s';
        $now = date($format);
        $title = 'Reporte';
        
        $pdf = PDF::loadView('Report/pdf', ['rents' => $rents, 'title' => $title]);
        return $pdf->download('renta_transport.pdf');
        return view('Report/pdf', ['rents' => $rents, 'title' => $title]);
    }

    public function getExportingData($constraints) {
        return DB::table('rents')
        ->join('warehouses_machinarys', 'rents.warehous_machinary_id', 'warehouses_machinarys.id')
        ->join('machinerys', 'warehouses_machinarys.machinery_id', 'machinerys.id')
        ->join('sales_costs', 'warehouses_machinarys.sale_cost_id', 'sales_costs.id')
        ->join('customers', 'rents.customer_id', '=', 'customers.id')
        ->join('municipalitys', 'customers.municipality_id', '=', 'municipalitys.id')
        ->join('departaments', 'municipalitys.departament_id', '=', 'departaments.id')
        ->select('rents.*', 'machinerys.name as machinery', 'machinerys.model as model', 'machinerys.km as km', 'machinerys.description as description', 'machinerys.photo as photo', 'sales_costs.cost as cost', 'customers.dpi as dpi', 'customers.first_name as first_name', 'customers.second_name as second_name', 'customers.first_last_name as first_last_name', 'customers.second_last_name as second_last_name', 'customers.direction as direction', 'customers.phone as phone', 'municipalitys.name as municipality', 'departaments.name as departament', DB::raw('(rents.hour * rents.quantity * sales_costs.cost) as ventas'))
        ->where('rents.id', $constraints->id)
        ->get()
        ->map(function ($item, $key) {
        return (array) $item;
        })
        ->all();
    }    
}
