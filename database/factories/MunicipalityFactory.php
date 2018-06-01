<?php

use Faker\Generator as Faker;

$factory->define(App\Municipality::class, function (Faker $faker) {
    return [
      'name' => null,
      'departament_id' => null
    ];
});
