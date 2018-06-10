<?php

namespace App\Http\Controllers;

use App\TransportMateria;
use App\Operator;
use App\Extraction;
use App\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;

class ControllerTransPorTransportMateria extends Controller
{
    protected $redirectTo = 'transport/transport-transportmateria';

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
                    ->select('transports_materias.*', 'employees.first_name as first_name', 'employees.second_name as second_name', 'employees.first_last_name as first_last_name', 'employees.second_last_name as second_last_name', 'machinerys.name as machinery', 'states.name as state', 'extractions.quantity as extraction', 'types_extractions.name as types_extraction',
                        'states_subjects.name as state_subject', 'units_measurements.name as unit_measurement', 'organitations.name as organitation', 'municipalitys.name as municipality')
                    ->paginate(10);
        return view('TransportMateria/index', ['dats' => $dats]);
    }

    public function create()
    {
        $employees = Employee::where('id', Auth::user()->employee_id)->get();
        foreach ($employees as $employee) {
            $organitation_id = $employee->organitation_id;
        }

        $operators = Operator::join('employees', 'operators.employee_id', 'employees.id')
                                ->join('machinerys', 'operators.machinery_id', 'machinerys.id')
                                ->where('employees.organitation_id', $organitation_id)
                                ->where('operators.state_id', 1)
                                ->select('operators.*', 'employees.first_name as first_name', 'employees.second_name as second_name', 'employees.first_last_name as first_last_name', 'employees.second_last_name as second_last_name', 'machinerys.name as machinery')->get();

        $extractions = Extraction::join('types_extractions', 'extractions.type_extraction_id', 'types_extractions.id')
                                ->join('units_measurements', 'types_extractions.unit_measurement_id', 'units_measurements.id')
                                ->select('extractions.*', 'types_extractions.name as type_extraction', 'units_measurements.name as unit_measurement')->get();
        return view('TransportMateria/create', ['operators' => $operators, 'extractions' => $extractions]);
    }

    public function store(Request $request)
    {
        $insert = new TransportMateria();
        $insert->answer = true;
        $insert->operator_id = $request->operator_id;
        $insert->extraction_id = $request->extraction_id;
        if($insert->save()){
            $insert = Operator::findOrFail($request->operator_id);
            $insert->state_id = 3;
            $insert->save();
            Flash('¡Se agrego correctament!')->success();
            return redirect()->intended('/transport/transport-transportmateria');
        }
        else{
            Flash('¡Ocurrio un Error en el proceso!')->error();
            return redirect()->intended('/transport/transport-transportmateria');            
        }
    }

    public function show($id)
    {
        $data = TransportMateria::all()->find($id);

        if($data == null || count($data) == 0)
        {
            Flash('¡Error, no existe la información seleccionado!')->error();
            return redirect()->intended('/transport/transport-transportmateria');
        }
        else
        {
            $employees = Employee::where('id', Auth::user()->employee_id)->get();
            foreach ($employees as $employee) {
                $organitation_id = $employee->organitation_id;
            }

            $operators = Operator::join('employees', 'operators.employee_id', 'employees.id')
                                    ->join('machinerys', 'operators.machinery_id', 'machinerys.id')
                                    ->where('employees.organitation_id', $organitation_id)
                                    ->where('operators.state_id', 1)
                                    ->select('operators.*', 'employees.first_name as first_name', 'employees.second_name as second_name', 'employees.first_last_name as first_last_name', 'employees.second_last_name as second_last_name', 'machinerys.name as machinery')->get();

            $extractions = Extraction::join('types_extractions', 'extractions.type_extraction_id', 'types_extractions.id')
                                ->join('units_measurements', 'types_extractions.unit_measurement_id', 'units_measurements.id')
                                ->select('extractions.*', 'types_extractions.name as type_extraction', 'extractions.quantity as extraction', 'units_measurements.name as unit_measurement')->get();

            return view('TransportMateria/view', ['data' => $data, 'operators' => $operators, 'extractions' => $extractions]);
        } 
    }

    public function edit($id)
    {
        $data = TransportMateria::all()->find($id);

        if($data == null || count($data) == 0)
        {
            Flash('¡Error, no existe la información seleccionado!')->error();
            return redirect()->intended('/transport/transport-transportmateria');
        }
        else
        {
            $employees = Employee::where('id', Auth::user()->employee_id)->get();
            foreach ($employees as $employee) {
                $organitation_id = $employee->organitation_id;
            }

            $operators = Operator::join('employees', 'operators.employee_id', 'employees.id')
                                    ->join('machinerys', 'operators.machinery_id', 'machinerys.id')
                                    ->where('employees.organitation_id', $organitation_id)
                                    ->where('operators.state_id', 1)
                                    ->select('operators.*', 'employees.first_name as first_name', 'employees.second_name as second_name', 'employees.first_last_name as first_last_name', 'employees.second_last_name as second_last_name', 'machinerys.name as machinery')->get();

            $extractions = Extraction::join('types_extractions', 'extractions.type_extraction_id', 'types_extractions.id')
                                ->join('units_measurements', 'types_extractions.unit_measurement_id', 'units_measurements.id')
                                ->select('extractions.*', 'types_extractions.name as type_extraction', 'extractions.quantity as extraction', 'units_measurements.name as unit_measurement')->get();

            return view('TransportMateria/edit', ['data' => $data, 'operators' => $operators, 'extractions' => $extractions]);
        } 
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
