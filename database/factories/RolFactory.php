<?php

use Faker\Generator as Faker;

$factory->define(App\Rol::class, function (Faker $faker) {
    return [
        'organitation_id' => null,
        'name' => null
    ];
});
