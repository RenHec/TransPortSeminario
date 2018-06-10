<?php

namespace App\Http\Controllers;

use App\Extraction;
use App\Employee;
use App\Operator;
use App\TypeExtraction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;

class ControllerTransPorExtraction extends Controller
{
   protected $redirectTo = 'transport/transport-extraction';

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

        $dats = DB::table('extractions')
                    ->join('operators', 'extractions.operator_id', 'operators.id')
                    ->join('employees', 'operators.employee_id', 'employees.id')
                    ->join('machinerys', 'operators.machinery_id', 'machinerys.id')
                    ->join('types_extractions', 'extractions.type_extraction_id', 'types_extractions.id')
                    ->join('states_subjects', 'types_extractions.state_subject_id', 'states_subjects.id')
                    ->join('units_measurements', 'types_extractions.unit_measurement_id', 'units_measurements.id')
                    ->join('organitations', 'extractions.organitation_id', 'organitations.id')
                    ->join('municipalitys', 'organitations.municipality_id', 'municipalitys.id')
                    ->where('extractions.organitation_id', $organitation_id)
                    ->select('extractions.*', 'employees.first_name as first_name', 'employees.second_name as second_name', 'employees.first_last_name as first_last_name', 'employees.second_last_name as second_last_name', 'machinerys.name as machinery', 'types_extractions.name as types_extraction',
                        'states_subjects.name as state_subject', 'units_measurements.name as unit_measurement', 'organitations.name as organitation', 'municipalitys.name as municipality')
                    ->paginate(10);
        return view('Extraction/index', ['dats' => $dats]);
    }

    public function create()
    {
        $employees = Employee::where('id', Auth::user()->employee_id)->get();
        foreach ($employees as $employee) {
            $organitation_id = $employee->organitation_id;
        }

        $operators = Operator::join('employees', 'operators.employee_id', 'employees.id')
                                ->where('employees.organitation_id', $organitation_id)
                                ->select('operators.*', 'employees.first_name as first_name', 'employees.second_name as second_name', 'employees.first_last_name as first_last_name', 'employees.second_last_name as second_last_name')->get();

        $types_extractions = TypeExtraction::mostrarInformacion();

        return view('Extraction/create', ['operators' => $operators, 'types_extractions' => $types_extractions]);
    }

    public function store(Request $request)
    {
        $employees = Employee::where('id', Auth::user()->employee_id)->get();
        foreach ($employees as $employee) {
            $organitation_id = $employee->organitation_id;
        }

        $insert = new Extraction();
        $insert->quantity = $request->quantity;
        $insert->operator_id = $request->operator_id;
        $insert->type_extraction_id = $request->type_extraction_id;
        $insert->organitation_id = $organitation_id;
        if($insert->save()){
            Flash('¡Ocurrio un Error en el proceso!')->success();
            return redirect()->intended('/transport/transport-extraction');
        }
        else{
            Flash('¡Ocurrio un Error en el proceso!')->error();
            return redirect()->intended('/transport/transport-extraction');            
        }
    }

    public function show($id)
    {
        $data = Extraction::all()->find($id);

        if($data == null || count($data) == 0)
        {
            Flash('¡Error, no existe la información seleccionado!')->error();
            return redirect()->intended('/transport/transport-extraction');
        }
        else
        {
            $employees = Employee::where('id', Auth::user()->employee_id)->get();
            foreach ($employees as $employee) {
                $organitation_id = $employee->organitation_id;
            }

            $operators = Operator::join('employees', 'operators.employee_id', 'employees.id')
                                    ->where('employees.organitation_id', $organitation_id)
                                    ->select('operators.*', 'employees.first_name as first_name', 'employees.second_name as second_name', 'employees.first_last_name as first_last_name', 'employees.second_last_name as second_last_name')->get();

            $types_extractions = TypeExtraction::mostrarInformacion();

            return view('Extraction/view', ['data' => $data, 'operators' => $operators, 'types_extractions' => $types_extractions]);
        } 
    }

    public function edit($id)
    {
        $data = Extraction::all()->find($id);

        if($data == null || count($data) == 0)
        {
            Flash('¡Error, no existe la información seleccionado!')->error();
            return redirect()->intended('/transport/transport-extraction');
        }
        else
        {
            $employees = Employee::where('id', Auth::user()->employee_id)->get();
            foreach ($employees as $employee) {
                $organitation_id = $employee->organitation_id;
            }

            $operators = Operator::join('employees', 'operators.employee_id', 'employees.id')
                                    ->where('employees.organitation_id', $organitation_id)
                                    ->select('operators.*', 'employees.first_name as first_name', 'employees.second_name as second_name', 'employees.first_last_name as first_last_name', 'employees.second_last_name as second_last_name')->get();

            $types_extractions = TypeExtraction::mostrarInformacion();

            return view('Extraction/edit', ['data' => $data, 'operators' => $operators, 'types_extractions' => $types_extractions]);
        } 
    }

    public function update(Request $request, $id)
    {
        $insert = Extraction::findOrFail($id);
        $insert->quantity = $request->quantity;
        $insert->operator_id = $request->operator_id;
        $insert->type_extraction_id = $request->type_extraction_id;
        if($insert->save()){
            Flash('¡La información fue creada exitosamente!')->success();
            return redirect()->intended('/transport/transport-extraction');            
        }
        else{
            Flash('¡Ocurrio un Error en el proceso!')->error();
            return redirect()->intended('/transport/transport-extraction');
        } 
    }

    public function destroy($id)
    {
        //
    }
}
