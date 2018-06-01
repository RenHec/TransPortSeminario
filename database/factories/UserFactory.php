<?php

use Faker\Generator as Faker;
//Test de Base de Datos + ORM ...
$factory->define(App\User::class, function (Faker $faker) {
    return [
      'dpi' => null,
      'first_name' => null,
      'second_name' => null,
      'first_last_name' => null,
      'second_last_name' => null,
      'username' => null,
      'email' => null,
      'password' => null,
      'direction' => null,
      'rol_id' => null,
      'municipality_id' => null,
      'avatar' => null,
      'remember_token' => str_random(10),
      'estado' => null,
      'token'=> null
    ];
});
