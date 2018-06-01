<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Municipality;

class MunicipalitysController extends Controller
{
  public function getMunicipalitys(Request $request, $id){
      if($request->ajax()){
        $municipalitys = Municipality::buscar($id);
        return response()->json($municipalitys);
      }
  }
}
