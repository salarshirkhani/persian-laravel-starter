<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\SliderItem;
use Faker\Generator as Faker;

$factory->define(SliderItem::class, function (Faker $faker) {
    return [
        'title' => $faker->realText(50),
        'priority' => $faker->randomNumber(2),
        'url' => $faker->url,
    ];
});
