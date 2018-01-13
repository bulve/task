<?php

use Faker\Generator as Faker;

$factory->define(App\Transaction::class, function (Faker $faker) {
    return [
        'transaction_type' => $faker->randomElement($array = array (1,2)),
        'client_id' => \App\Client::get()->random()->id,
        'account_id' => \App\Account::get()->random()->id,
        'amount' => $faker->randomFloat($nbMaxDecimals = NULL, $min = 0, $max = NULL),
        'currency' => $faker->randomElement($array = array (1,2,3))
   
        
    ];
});

          