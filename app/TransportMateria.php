<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransportMateria extends Model
{
    protected $table = 'transports_materias';
    protected $guarded = [
        'id',
        'operator_id',
        'extraction_id',
    ];
    protected $fillable = [
        'answer',
        'confirmed',                         
    ];
}
