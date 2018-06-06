<?php

namespace App\Http\Controllers;

use App\TypeExtraction;
use App\StateSubject;
use App\UnitMeasurement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ControllerTransPorTypeExtraction extends Controller
{
    protected $redirectTo = 'transport/transport-typeextraction';

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $dats = DB::table('types_extractions')
                    ->join('states_subjects', 'types_extractions.state_subject_id', 'states_subjects.id')
                    ->join('units_measurements', 'types_extractions.unit_measurement_id', 'units_measurements.id')
                    ->select('types_extractions.*', 'states_subjects.name as states_subjects', 'units_measurements.name as unit_measurement', 'units_measurements.abbreviation as abbreviation')->paginate(10);
        return view('TypeExtraction/index', ['dats' => $dats]);
    }

    public function create()
    {
        $unitmesurements = UnitMeasurement::mostrarInformacion();
        $statesubjects = StateSubject::mostrarInformacion();
        return view('TypeExtraction/create', ['unitmesurements' => $unitmesurements, 'statesubjects' => $statesubjects]);
    }

    public function store(Request $request)
    {
        $insert = new TypeExtraction();
        $insert->state_subject_id = $request->state_subject_id;
        $insert->unit_measurement_id = $request->unit_measurement_id;
        $insert->name = $request->name;
        if($insert->save()){
            Flash('¡Ocurrio un Error en el proceso!')->success();
            return redirect()->intended('/transport/transport-typeextraction');
        }
        else{
            Flash('¡Ocurrio un Error en el proceso!')->error();
            return redirect()->intended('/transport/transport-typeextraction');            
        }
    }

    public function show($id)
    {
        $data = TypeExtraction::find($id);

        if($data == null || count($data) == 0)
        {
            Flash('¡Error, no existe la información seleccionado!')->error();
            return redirect()->intended('/transport/transport-typeextraction');
        }
        else
        {
            $unitmesurements = UnitMeasurement::mostrarInformacion();
            $statesubjects = StateSubject::mostrarInformacion();           
            return view('TypeExtraction/view', ['data' => $data, 'unitmesurements' => $unitmesurements, 'statesubjects' => $statesubjects]);
        } 
    }

    public function edit($id)
    {
        $data = TypeExtraction::find($id);

        if($data == null || count($data) == 0)
        {
            Flash('¡Error, no existe la información seleccionado!')->error();
            return redirect()->intended('/transport/transport-typeextraction');
        }
        else
        {
            $unitmesurements = UnitMeasurement::mostrarInformacion();
            $statesubjects = StateSubject::mostrarInformacion();           
            return view('TypeExtraction/edit', ['data' => $data, 'unitmesurements' => $unitmesurements, 'statesubjects' => $statesubjects]);
        } 
    }

    public function update(Request $request, $id)
    {
        $insert = TypeExtraction::findOrFail($id);
        $insert->state_subject_id = $request->state_subject_id;
        $insert->unit_measurement_id = $request->unit_measurement_id;
        $insert->name = $request->name;
        if($insert->save()){
            Flash('¡La información fue creada exitosamente!')->success();
            return redirect()->intended('/transport/transport-typeextraction');            
        }
        else{
            Flash('¡Ocurrio un Error en el proceso!')->error();
            return redirect()->intended('/transport/transport-typeextraction');
        } 
    }

    public function destroy($id)
    {
        //
    }
}
