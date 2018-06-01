<?php

use Illuminate\Database\Seeder;

class RolSeeder extends Seeder
{
    public function run()
    {
      $rol = factory(App\Rol::class)->create([
        'name'=>'ADMINISTRADOR'
      ]);

      $rol = factory(App\Rol::class)->create([
        'name'=>'GERENTE'
      ]);

      $rol = factory(App\Rol::class)->create([
        'name'=>'EMPLEADO'
      ]);
    }
}
