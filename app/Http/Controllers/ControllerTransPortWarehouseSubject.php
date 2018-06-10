<?php

namespace App\Http\Controllers;

use App\WarehouseSubect;
use App\TransportMateria;
use App\Operator;
use App\Extraction;
use App\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;

class ControllerTransPortWarehouseSubject extends Controller
{
    protected $redirectTo = 'transport/transport-warehousesubject';

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $employees = Employee::where('id', Auth::user()->employee_id)->get();
        foreach ($employees as $employee) {
            $organitation_id = $employee->organitation_id;
        }
        if($organitation_id == 7){
            $organitation_id = 2;
        }
        if($organitation_id == 6){
            $organitation_id = 3;
        }
        if($organitation_id == 5){
            $organitation_id = 4;
        }                


        $transports_materias = DB::table('warehouses_subjects_primarys')
                    ->join('transports_materias', 'warehouses_subjects_primarys.transport_materia_id', 'transports_materias.id')
                    ->join('extractions', 'transports_materias.extraction_id', 'extractions.id')
                    ->join('types_extractions', 'extractions.type_extraction_id', 'types_extractions.id')
                    ->join('states_subjects', 'types_extractions.state_subject_id', 'states_subjects.id')
                    ->join('units_measurements', 'types_extractions.unit_measurement_id', 'units_measurements.id')
                    ->join('organitations', 'extractions.organitation_id', 'organitations.id')
                    ->join('municipalitys', 'organitations.municipality_id', 'municipalitys.id')
                    ->where('extractions.organitation_id', $organitation_id)
                    ->where('transports_materias.confirmed', true)
                    ->select('transports_materias.*', 'extractions.quantity as extraction', 'types_extractions.name as types_extraction',
                        'states_subjects.name as state_subject', 'units_measurements.name as unit_measurement', 'organitations.name as organitation', 'municipalitys.name as municipality')
                    ->orderBy('types_extractions.name', 'desc')
                    ->paginate(10);

        $dats = DB::table('transports_materias')
                    ->join('operators', 'transports_materias.operator_id', 'operators.id')
                    ->join('employees', 'operators.employee_id', 'employees.id')
                    ->join('machinerys', 'operators.machinery_id', 'machinerys.id')
                    ->join('states', 'operators.state_id', 'states.id')
                    ->join('extractions', 'transports_materias.extraction_id', 'extractions.id')
                    ->join('types_extractions', 'extractions.type_extraction_id', 'types_extractions.id')
                    ->join('states_subjects', 'types_extractions.state_subject_id', 'states_subjects.id')
                    ->join('units_measurements', 'types_extractions.unit_measurement_id', 'units_measurements.id')
                    ->join('organitations', 'extractions.organitation_id', 'organitations.id')
                    ->join('municipalitys', 'organitations.municipality_id', 'municipalitys.id')
                    ->where('extractions.organitation_id', $organitation_id)
                    ->where('transports_materias.confirmed', null)
                    ->select('transports_materias.*', 'employees.first_name as first_name', 'employees.second_name as second_name', 'employees.first_last_name as first_last_name', 'employees.second_last_name as second_last_name', 'machinerys.name as machinery', 'states.name as state', 'extractions.quantity as extraction', 'types_extractions.name as types_extraction',
                        'states_subjects.name as state_subject', 'units_measurements.name as unit_measurement', 'organitations.name as organitation', 'municipalitys.name as municipality')
                    ->paginate(10);

        return view('WarehouseSubect/index', ['dats' => $dats, 'transports_materias' => $transports_materias]);
    }

    public function update(Request $request, $id)
    {
        $transports_materias = TransportMateria::findOrFail($id);
        $datas = TransportMateria::where('id', $id)->get();

        foreach ($datas as $transport_materia) {
            $operator_id = $transport_materia->operator_id;
        }

        $operators = Operator::findOrFail($operator_id);

        if($request->update = 1){
            $transports_materias->confirmed = false;
            $transports_materias->save();
            $operators->state_id = 1;
            $operators->save();
            Flash('¡Se agrego correctament!')->success();
            return redirect()->intended('/transport/transport-warehousesubject');
        }
        if($request->update = 2){
            $insert = new WarehouseSubect();
            $insert->transport_materia_id = $id;
            if($insert->save()){
                $transports_materias->confirmed = true;
                $transports_materias->save();
                $operators->state_id = 1;
                $operators->save();
                Flash('¡Se agrego correctament!')->success();
                return redirect()->intended('/transport/transport-warehousesubject');
            }
            else{
                Flash('¡Ocurrio un Error en el proceso!')->error();
                return redirect()->intended('/transport/transport-warehousesubject');            
            }
        }        
    }
}
