<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Machinery extends Model
{
    protected $table = 'machinerys';
    protected $guarded = [
        'id',
        'category_id',
    ];
    protected $fillable = [
        'name',
        'model',
        'km',  
        'description',
        'photo',                          
    ];

	public static function mostrarInformacion(){
	  	return Machinery::select('id', 'name', 'model')->orderBy('name', 'asc')->get();
	} 

	public static function buscar($id){
	   	return Machinery::where('departament_id', $id)->orderBy('name', 'asc')->get();
	}	
}
