<?php

use Illuminate\Database\Seeder;

class PaymentSeeder extends Seeder
{
    public function run()
    {
      $payment = factory(App\Payment::class)->create([
        'name'=>'NINGUNO',
        'percentage'=>'0'
      ]);

      $payment = factory(App\Payment::class)->create([
        'name'=>'GOBIERNO',
        'percentage'=>'30'
      ]);

      $payment = factory(App\Payment::class)->create([
        'name'=>'INICIATIVA PRIVADA',
        'percentage'=>'25'
      ]);

      $payment = factory(App\Payment::class)->create([
        'name'=>'PARTICULAR',
        'percentage'=>'25'
      ]);

      $payment = factory(App\Payment::class)->create([
        'name'=>'CLIENTE',
        'percentage'=>'15'
      ]);
    }
}
