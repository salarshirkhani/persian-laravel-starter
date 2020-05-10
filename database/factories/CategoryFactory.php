<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Category;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {
    return [
        'name' => $faker->realText(40),
        'slug' => str_replace(" ", "-", $faker->words(3, true)),
        'description' => $faker->realText(600),
    ];
});

$factory->state(Category::class, 'company', [
    'type' => 'company'
]);

$factory->state(Category::class, 'product', [
    'type' => 'product'
]);

$factory->state(Category::class, 'service', [
    'type' => 'service'
]);
