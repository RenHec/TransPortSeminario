<?php

use Faker\Generator as Faker;

$factory->define(App\Employee::class, function (Faker $faker) {
    return [
        'municipality_id' => null,    	
        'dpi' => null,
        'first_name' => null,
        'second_name'=> null,
        'first_last_name' => null,
        'second_last_name' => null,
        'date_birth' => null,
        'direction' => null,
        'avatar' => null,
        'phone' => null,
        'type_license' => null,
        'organitation_id' => null,
        'low' => null,
    ];
});
