<?php

use Faker\Generator as Faker;

$factory->define(App\Menu::class, function (Faker $faker) {
    return [
    	'name' => null,
        'action' => null,
        'id_father' => null   	
    ];
});
