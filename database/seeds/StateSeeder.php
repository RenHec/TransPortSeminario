<?php

use Illuminate\Database\Seeder;

class StateSeeder extends Seeder
{
    public function run()
    {
	      $data = factory(App\State::class)->create([
	        'name' => 'Activo'
	      ]);

	      $data = factory(App\State::class)->create([
	        'name' => 'Inactivo'
	      ]);  

	      $data = factory(App\State::class)->create([
	        'name' => 'Ocupado'
	      ]);  	        	          	
    }
}
