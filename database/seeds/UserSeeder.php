<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
      $user = factory(App\User::class)->create([
        'rol_id' => '1',
        'employee_id' => '1',
        'state_id' => '1',
        'username' => 'renato.ojeda',
        'email' => 'renato.ojeda.1993@gmail.com',
        'password' => bcrypt('admin123'),
        'token' => bcrypt('@!585det')
      ]);      
    }
}
