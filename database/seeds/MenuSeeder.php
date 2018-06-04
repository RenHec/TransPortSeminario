<?php

use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    public function run()
    {
	      $data = factory(App\Menu::class)->create([
	        'name' => 'Rol',
	        'action' => 'transport-rol.index',
	        'id_father' => '1',
	      ]);
    }
}
