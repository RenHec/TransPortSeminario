<?php

namespace App\Http\Controllers;

use App\TBFormulario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ControllerTBFormulario extends Controller
{

    protected $redirectTo = 'transport/transport-formulario';

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $dats = DB::table('tb_formularios')->paginate(10);

        return view('Formulario/index', ['dats' => $dats]);
    }

    public function create()
    {
        return view('Formulario/create');
    }

    public function store(Request $request)
    {
        //dd($request->all());
        $insert = new TBFormulario();
        $insert->nombre_cliente = $request->nombre_cliente;
        $insert->apellido_cliente = $request->apellido_cliente;
        $insert->direccion = $request->direccion;
        $insert->telefono = $request->telefono;
        $insert->nit = $request->nit;
        $insert->estado_civil = $request->estado_civil;
        $insert->status = true;
        if($insert->save()){
            Flash('¡La información fue creada exitosamente!')->success();  
            return redirect()->intended('/transport/transport-formulario');        
        }
        else{
            Flash('¡Ocurrio un Error en el proceso!')->error();
            return redirect()->intended('/transport/transport-formulario');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TBFormulario  $tBFormulario
     * @return \Illuminate\Http\Response
     */
    public function show(TBFormulario $tBFormulario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TBFormulario  $tBFormulario
     * @return \Illuminate\Http\Response
     */
    public function edit(TBFormulario $tBFormulario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TBFormulario  $tBFormulario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TBFormulario $tBFormulario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TBFormulario  $tBFormulario
     * @return \Illuminate\Http\Response
     */
    public function destroy(TBFormulario $tBFormulario)
    {
        //
    }
}
