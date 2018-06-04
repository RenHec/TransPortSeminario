<?php

use Faker\Generator as Faker;

$factory->define(App\User::class, function (Faker $faker) {
    return [
      'username' => null,
      'email' => null,
      'password' => null,
      'rol_id' => null,
      'employee_id' => null,
      'state_id' => null,                
      'remember_token' => str_random(10),
      'token'=> null
    ];
});
