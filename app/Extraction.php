<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Extraction extends Model
{
	protected $table = 'extractions';
	protected $guarded = [
	  'operator_id',
	  'type_extraction_id',
	  'organitation_id'
	];

	protected $fillable = [
	  'quantity',   
	]; 	
}
