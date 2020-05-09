<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' => $faker->firstName,
        'short_description' => $faker->realText(300),
        'description' => $faker->realText(1200),
        'price' => $faker->numberBetween(5, 5000) * 1000,
    ];
});

$factory->state(Product::class, 'withPhoto', function (Faker $faker) {
    $photo = 'products/' . \Str::random(40) . '.jpg';
    Storage::put("public/$photo", file_get_contents("https://loremflickr.com/800/800/shop,product/all"));
    return [
        'photo' => $photo
    ];
});
