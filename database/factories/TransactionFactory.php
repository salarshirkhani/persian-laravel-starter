<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Transaction;
use Faker\Generator as Faker;

$factory->define(Transaction::class, function (Faker $faker) {
    return [
        'transaction_id' => $faker->uuid,
        'amount' => $faker->numberBetween(1000, 50000) * 100,
    ];
});
