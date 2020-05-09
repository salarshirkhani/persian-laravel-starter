<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Service;
use Faker\Generator as Faker;

$factory->define(Service::class, function (Faker $faker) {
    return [
        'name' => $faker->firstName,
        'short_description' => $faker->realText(300),
        'description' => $faker->realText(1200),
    ];
});

$factory->state(Service::class, 'withPhoto', function (Faker $faker) {
    $photo = 'services/' . \Str::random(40) . '.jpg';
    Storage::put("public/$photo", file_get_contents("https://loremflickr.com/800/800/service,product/all"));
    return [
        'photo' => $photo
    ];
});
