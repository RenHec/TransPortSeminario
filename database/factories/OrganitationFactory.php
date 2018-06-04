<?php

use Faker\Generator as Faker;

$factory->define(App\Organitation::class, function (Faker $faker) {
    return [
	  	'municipality_id' => null,      	
	    'name' => null,  
	    'direction' => null  
    ];
});
