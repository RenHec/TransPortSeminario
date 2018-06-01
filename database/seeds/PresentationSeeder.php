<?php

use Illuminate\Database\Seeder;

class PresentationSeeder extends Seeder
{
    public function run()
    {
      $presentation = factory(App\Presentation::class)->create([
        'name'=>'TABLETA'
      ]);

      $presentation = factory(App\Presentation::class)->create([
        'name'=>'CAPSULA'
      ]);

      $presentation = factory(App\Presentation::class)->create([
        'name'=>'SOLUCION INYECTABLE'
      ]);

      $presentation = factory(App\Presentation::class)->create([
        'name'=>'POLVO'
      ]);

      $presentation = factory(App\Presentation::class)->create([
        'name'=>'GRAGEA'
      ]);

      $presentation = factory(App\Presentation::class)->create([
        'name'=>'COMPRIMIDO'
      ]);

      $presentation = factory(App\Presentation::class)->create([
        'name'=>'SUPOSITORIO'
      ]);
    }
}
