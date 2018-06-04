<?php

use Illuminate\Database\Seeder;

class RolMenuButtonSeeder extends Seeder
{
    public function run()
    {
	      $data = factory(App\RolMenuButton::class)->create([
	        'rol_id' => '1',
	        'button_id' => '1',
	        'menu_id' => '1',	        
	      ]);
    }
}
