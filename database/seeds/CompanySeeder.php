<?php

use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    public function run()
    {
      $company = factory(App\Company::class)->create([
       'name' => 'CLARO'
      ]);

      $company = factory(App\Company::class)->create([
       'name' => 'TIGO'
      ]);

      $company = factory(App\Company::class)->create([
       'name' => 'MOVISTAR'
      ]);

      $company = factory(App\Company::class)->create([
       'name' => 'LINEA FIJA'
      ]);
    }
}
