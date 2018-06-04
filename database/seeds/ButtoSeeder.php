<?php

use Illuminate\Database\Seeder;

class ButtoSeeder extends Seeder
{
    public function run()
    {
	      $data = factory(App\Button::class)->create([
	        'name' => 'Crear'
	      ]);

	      $data = factory(App\Button::class)->create([
	        'name' => 'Guardar'
	      ]);	 

	      $data = factory(App\Button::class)->create([
	        'name' => 'Editar'
	      ]);	

	      $data = factory(App\Button::class)->create([
	        'name' => 'Aprobar'
	      ]);	

	      $data = factory(App\Button::class)->create([
	        'name' => 'Rechazar'
	      ]);	      	       	           
    }    	
}
