<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TBFormulario extends Model
{
    protected $table = 'tb_formularios';
    protected $fillable = [
    	'id',
    	'nombre_cliente',
    	'apellido_cliente',
    	'direccion',
    	'telefono',
    	'nit',
    	'estado_civil',
    	'status'
    ];
}
