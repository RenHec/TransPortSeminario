<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	protected $table = 'categories';
	protected $guarded = [
	  'id'
	];

	protected $fillable = [
	  'name',   
	]; 

	public static function mostrarInformacion(){
	  	return Category::select('id', 'name')->orderBy('name', 'asc')->get();
	}  	
}
