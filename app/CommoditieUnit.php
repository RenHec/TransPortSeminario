<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommoditieUnit extends Model
{
    protected $table = 'commodities_units';
    protected $guarded = [
        'id',
        'type_extraction_id',
        'unit_id',        
    ];
    protected $fillable = [
        'quantity',                
    ];
}
