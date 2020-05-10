<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Keyword;
use Faker\Generator as Faker;

$factory->define(Keyword::class, function (Faker $faker) {
    return [
        'name' => implode(" ", $faker->words(3))
    ];
});

$factory->state(Keyword::class, 'company', [
    'type' => 'company'
]);

$factory->state(Keyword::class, 'product', [
    'type' => 'product'
]);

$factory->state(Keyword::class, 'service', [
    'type' => 'service'
]);
