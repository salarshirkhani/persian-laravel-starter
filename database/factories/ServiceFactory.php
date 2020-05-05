<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Service;
use Faker\Generator as Faker;

$factory->define(Service::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'short_description' => $faker->paragraphs(2, true),
        'description' => $faker->paragraphs(6, true),
    ];
});
