<?php

namespace App\Http\Controllers;

use App\Operator;
use App\Employee;
use App\Category;
use App\Machinery;
use App\WarehouseMachinary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;

class ControllerTransPorOperator extends Controller
{
    protected $redirectTo = 'transport/transport-operator';

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

        $dats = DB::table('operators')
                    ->join('employees', 'operators.employee_id', 'employees.id')
                    ->join('machinerys', 'operators.machinery_id', 'machinerys.id')
                    ->join('states', 'operators.state_id', 'states.id')
                    ->where('employees.organitation_id', $organitation_id)
                    ->select('operators.*', 'employees.first_name as first_name', 'employees.second_name as second_name', 'employees.first_last_name as first_last_name', 'employees.second_last_name as second_last_name', 'machinerys.name as machinery', 'states.name as state')
                    ->paginate(10);
        return view('Operator/index', ['dats' => $dats]);
    }

    public function create()
    {
        $employees = Employee::where('id', Auth::user()->employee_id)->get();
        foreach ($employees as $employee) {
            $organitation_id = $employee->organitation_id;
        }

        $employeees = Employee::join('users', 'employees.id', 'users.employee_id')
                            ->where('employees.organitation_id', $organitation_id)
                            ->where('users.rol_id', '!=', Auth::user()->rol_id)
                            ->select('employees.*')->get();
        $categories = Category::mostrarInformacion();
        return view('Operator/create', ['employeees' => $employeees, 'categories' => $categories]);
    }

    public function store(Request $request)
    {
        $exists = WarehouseMachinary::where('machinery_id', $request->machinery_id)->get();
        if($exists->count() > 0)
        {
            foreach ($exists as $exist) {
                $stock = $exist->stock;
                $id = $exist->id;
                $usd = $exist->used;
            }
            
            $data = WarehouseMachinary::findOrFail($id);

            if($stock > 0){
                $insert = new Operator();
                $insert->employee_id = $request->employee_id;
                $insert->machinery_id = $request->machinery_id;
                $insert->state_id = 1;
                if($insert->save()){
                    $data->stock = $stock - 1;
                    $data->used = $usd + 1;
                    $data->save();
                    Flash('¡Se agrego correctament!')->success();
                    return redirect()->intended('/transport/transport-operator');
                }
                else{
                    Flash('¡Ocurrio un Error en el proceso!')->error();
                    return redirect()->intended('/transport/transport-operator');            
                }            
            }else{
                Flash('¡No hay maquinaria!')->warning();
                return redirect()->intended('/transport/transport-operator');               
            }
        }else{
            Flash('¡No hay maquinaria!')->warning();
            return redirect()->intended('/transport/transport-operator');               
        }
    }

    public function show($id)
    {
        $data = Operator::all()->find($id);

        if($data == null || count($data) == 0)
        {
            Flash('¡Error, no existe la información seleccionado!')->error();
            return redirect()->intended('/transport/transport-operator');
        }
        else
        {
            return view('Operator/view', ['data' => $data]);
        } 
    }

    public function edit($id)
    {
        $data = Operator::find($id);

        if($data == null || count($data) == 0)
        {
            Flash('¡Error, no existe la información seleccionado!')->error();
            return redirect()->intended('/transport/transport-operator');
        }
        else
        {
        $employees = Employee::where('id', Auth::user()->employee_id)->get();
        foreach ($employees as $employee) {
            $organitation_id = $employee->organitation_id;
        }

        $employeees = Employee::join('users', 'employees.id', 'users.employee_id')
                            ->where('employees.organitation_id', $organitation_id)
                            ->where('users.rol_id', '!=', Auth::user()->rol_id)
                            ->select('employees.*')->get();
        $categories = Category::mostrarInformacion();
        $machinerys = Machinery::mostrarInformacion();

            return view('Operator/edit', ['data' => $data, 'employeees' => $employeees, 'categories' => $categories, 'machinerys' => $machinerys]);
        }
    }

    public function update(Request $request, $id)
    {
        $insert = Operator::findOrFail($id);
        $insert->employee_id = $request->employee_id;
        $insert->machinery_id = $request->machinery_id;
        if($insert->save()){
            Flash('¡La información fue creada exitosamente!')->success();
            return redirect()->intended('/transport/transport-operator');            
        }
        else{
            Flash('¡Ocurrio un Error en el proceso!')->error();
            return redirect()->intended('/transport/transport-operator');
        } 
    }

    public function destroy($id)
    {
        //
    }
}
