<?php

use Illuminate\Database\Seeder;

class OrganitationSeeder extends Seeder
{
    public function run()
    {
    	//1
	      $data = factory(App\Organitation::class)->create([
	        'municipality_id' => '57',
	        'name' => 'Administración Central',
	        'direction' => 'edificio Sixtino, Zona 10',
	      ]);
	    //2
	      $data = factory(App\Organitation::class)->create([
	        'municipality_id' => '153',
	        'name' => 'Planta de Extración',
	        'direction' => 'desconocido',
	      ]);
	    //3
	      $data = factory(App\Organitation::class)->create([
	        'municipality_id' => '74',
	        'name' => 'Planta de Extración',
	        'direction' => 'desconocido',
	      ]);
	    //4
	      $data = factory(App\Organitation::class)->create([
	        'municipality_id' => '177',
	        'name' => 'Planta de Extración',
	        'direction' => 'desconocido',
	      ]);	
	    //5
	      $data = factory(App\Organitation::class)->create([
	        'municipality_id' => '339',
	        'name' => 'Planta Materia Prima',
	        'direction' => 'desconocido',
	      ]);		      	      	      
	    //6
	      $data = factory(App\Organitation::class)->create([
	        'municipality_id' => '97',
	        'name' => 'Planta Materia Prima',
	        'direction' => 'desconocido',
	      ]);		
	    //7
	      $data = factory(App\Organitation::class)->create([
	        'municipality_id' => '153',
	        'name' => 'Planta Materia Prima',
	        'direction' => 'desconocido',
	      ]);
	    //8
	      $data = factory(App\Organitation::class)->create([
	        'municipality_id' => '339',
	        'name' => 'Planta Producción',
	        'direction' => 'desconocido',
	      ]);		      	      	      
	    //9
	      $data = factory(App\Organitation::class)->create([
	        'municipality_id' => '97',
	        'name' => 'Planta Producción',
	        'direction' => 'desconocido',
	      ]);		
	    //10
	      $data = factory(App\Organitation::class)->create([
	        'municipality_id' => '153',
	        'name' => 'Planta Producción',
	        'direction' => 'desconocido',
	      ]);	
	    //11
	      $data = factory(App\Organitation::class)->create([
	        'municipality_id' => '339',
	        'name' => 'Distribución de Productos',
	        'direction' => 'desconocido',
	      ]);		      	      	      
	    //12
	      $data = factory(App\Organitation::class)->create([
	        'municipality_id' => '97',
	        'name' => 'Distribución de Productos',
	        'direction' => 'desconocido',
	      ]);		
	    //13
	      $data = factory(App\Organitation::class)->create([
	        'municipality_id' => '153',
	        'name' => 'Distribución de Productos',
	        'direction' => 'desconocido',
	      ]);	
	    //14
	      $data = factory(App\Organitation::class)->create([
	        'municipality_id' => '57',
	        'name' => 'Transportes',
	        'direction' => 'desconocido',
	      ]);	            
    }
}
