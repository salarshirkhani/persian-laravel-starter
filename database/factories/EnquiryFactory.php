<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Enquiry;
use Faker\Generator as Faker;

$factory->define(Enquiry::class, function (Faker $faker) {
    return [
        'title' => $faker->realText(40),
        'description' => $faker->realText(800),
    ];
});

$factory->state(Enquiry::class, 'product', [
    'type' => 'product'
]);

$factory->state(Enquiry::class, 'service', [
    'type' => 'service'
]);
