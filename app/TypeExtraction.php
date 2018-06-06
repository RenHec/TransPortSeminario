<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypeExtraction extends Model
{
  protected $table = 'types_extractions';
  protected $guarded = [
  	'id',
  	'state_subject_id',
  	'unit_measurement_id',
  ];
  protected $fillable = [
  	'name',
  ]; 

	public static function mostrarInformacion(){
	   return TypeExtraction::select('id', 'name')->orderBy('name', 'asc')->get();
	}  
}
