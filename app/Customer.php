<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customers';
    protected $guarded = [
        'id',
        'municipality_id',
    ];
    protected $fillable = [
        'dpi',
        'first_name',
        'second_name',
        'first_last_name',
        'second_last_name',
        'date_birth',
        'direction',
        'phone',
    ];
}
