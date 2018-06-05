<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Municipality;
use App\Employee;
use App\Rol;

class MunicipalitysController extends Controller
{
  public function getMunicipalitys(Request $request, $id){
      if($request->ajax()){
        $municipalitys = Municipality::buscar($id);
        return response()->json($municipalitys);
      }
  }

  public function getEmployees(Request $request, $id){
      if($request->ajax()){
        $employees = Employee::buscarInformacion($id);
        return response()->json($employees);
      }
  }

  public function getRols(Request $request, $id){
      if($request->ajax()){
        $rols = Rol::buscarInformacion($id);
        return response()->json($rols);
      }
  }    
}
