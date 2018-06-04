<?php

use Faker\Generator as Faker;

$factory->define(App\RolMenuButton::class, function (Faker $faker) {
    return [
	  	'rol_id' => null,      	
	    'button_id' => null,  
	    'menu_id' => null  
    ];
});
