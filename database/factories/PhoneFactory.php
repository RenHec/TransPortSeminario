<?php

use Faker\Generator as Faker;

$factory->define(App\Phone::class, function (Faker $faker) {
    return [
      'cell_phone' => null,
      'company_id' => null
    ];
});
