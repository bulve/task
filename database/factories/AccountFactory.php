<?php

use Faker\Generator as Faker;

$factory->define(App\Account::class, function (Faker $faker) {
    return [
        'account_number' => $faker->numberBetween($min = 10000000, $max = 90000000),
        'client_id' => \App\Client::get()->random()->id,
        'balance' => $faker->randomFloat($nbMaxDecimals = NULL, $min = 0, $max = 10000),
    ];
});

            