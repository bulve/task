<?php

use Faker\Generator as Faker;

$factory->define(App\Client::class, function (Faker $faker) {
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'client_type' => $faker->randomElement($array = array (1,2)),
        'personal_code' => $faker->numberBetween($min = 10000000, $max = 90000000)
    ];
});


