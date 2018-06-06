<?php

namespace App\Http\Controllers;

use App\CommoditieUnit;
use App\Unit;
use App\TypeExtraction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ControllerTransPorCommoditieUnit extends Controller
{
    protected $redirectTo = 'transport/transport-commoditieunit';

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $dats = DB::table('commodities_units')
                    ->join('types_extractions', 'commodities_units.type_extraction_id', 'types_extractions.id')
                    ->join('units', 'commodities_units.unit_id', 'units.id')
                    ->join('states_subjects', 'types_extractions.state_subject_id', 'states_subjects.id')
                    ->join('units_measurements', 'types_extractions.unit_measurement_id', 'units_measurements.id')
                    ->select('commodities_units.*', 'types_extractions.name as types_extraction', 'units.name as unit', 'states_subjects.name as state_subject', 'units_measurements.name as unit_measurement')->orderBy('units.name', 'asc')->paginate(10);
        return view('CommoditieUnit/index', ['dats' => $dats]);
    }

    public function create()
    {
        $units = Unit::mostrarInformacion();
        $typesextractions = TypeExtraction::mostrarInformacion();
        return view('CommoditieUnit/create', ['units' => $units, 'typesextractions' => $typesextractions]);
    }

    public function store(Request $request)
    {
        $cantidad_componentes = Unit::where('id', $request->unit_id)->get();
        $unidades = CommoditieUnit::select('quantity_matter')->where('unit_id', $request->unit_id);
        
        foreach ($cantidad_componentes as $cantidad) {
            $componentes = $cantidad->quantity_matter;
        }
        
        if($componentes != $unidades->count()){
            $insert = new CommoditieUnit();
            $insert->type_extraction_id = $request->type_extraction_id;
            $insert->unit_id = $request->unit_id;
            $insert->quantity = $request->quantity;
            if($insert->save()){
                Flash('¡Ocurrio un Error en el proceso!')->success();
                return redirect()->intended('/transport/transport-commoditieunit');
            }
            else{
                Flash('¡Ocurrio un Error en el proceso!')->error();
                return redirect()->intended('/transport/transport-commoditieunit');            
            }
        }
        else{
            Flash('¡La asignación de materia prima esta completa!')->warning();
            return redirect()->intended('/transport/transport-commoditieunit');            
        }
    }

    public function show($id)
    {
        $data = CommoditieUnit::find($id);

        if($data == null || count($data) == 0)
        {
            Flash('¡Error, no existe la información seleccionado!')->error();
            return redirect()->intended('/transport/transport-commoditieunit');
        }
        else
        {
            $units = Unit::mostrarInformacion();
            $typesextractions = TypeExtraction::mostrarInformacion();          
            return view('CommoditieUnit/view', ['data' => $data, 'units' => $units, 'typesextractions' => $typesextractions]);
        } 
    }

    public function edit($id)
    {
        $data = CommoditieUnit::find($id);

        if($data == null || count($data) == 0)
        {
            Flash('¡Error, no existe la información seleccionado!')->error();
            return redirect()->intended('/transport/transport-commoditieunit');
        }
        else
        {
            $units = Unit::mostrarInformacion();
            $typesextractions = TypeExtraction::mostrarInformacion();          
            return view('CommoditieUnit/edit', ['data' => $data, 'units' => $units, 'typesextractions' => $typesextractions]);
        }  
    }

    public function update(Request $request, $id)
    {
        $insert = CommoditieUnit::findOrFail($id);
        $insert->type_extraction_id = $request->type_extraction_id;
        $insert->unit_id = $request->unit_id;
        $insert->quantity = $request->quantity;
        if($insert->save()){
            Flash('¡La información fue creada exitosamente!')->success();
            return redirect()->intended('/transport/transport-commoditieunit');            
        }
        else{
            Flash('¡Ocurrio un Error en el proceso!')->error();
            return redirect()->intended('/transport/transport-commoditieunit');
        } 
    }

    public function destroy($id)
    {
        //
    }
}
