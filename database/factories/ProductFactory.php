<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'short_description' => $faker->paragraphs(2, true),
        'description' => $faker->paragraphs(6, true),
        'price' => $faker->numberBetween(5, 5000) * 1000,
    ];
});
