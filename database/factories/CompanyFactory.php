<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Company;
use Faker\Generator as Faker;

$factory->define(Company::class, function (Faker $faker) {
    return [
        'name' => $faker->company,
        'short_description' => $faker->paragraphs(2, true),
        'description' => $faker->paragraphs(6, true),

        'province' => $faker->state,
        'city' => $faker->city,
        'address' => $faker->address,

        'phone_number' => $faker->e164PhoneNumber,
        'mobile_number' => $faker->e164PhoneNumber,
        'fax_number' => $faker->e164PhoneNumber,

        'latitude' => $faker->randomFloat(4, -90, 90),
        'longitude' => $faker->randomFloat(4, -180, 80),

        'social_instagram' => '@' . $faker->word,
        'social_telegram' => '@' . $faker->word,
        'social_facebook' => '@' . $faker->word,
        'social_twitter' => '@' . $faker->word,

        'website' => $faker->domainName
    ];
});

$factory->state(Company::class, 'product', [
    'type' => 'product'
]);

$factory->state(Company::class, 'service', [
    'type' => 'service'
]);
