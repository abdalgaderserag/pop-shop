<?php

use Faker\Generator as Faker;

$factory->define(App\Bio::class, function (Faker $faker) {
    return [
        'payment_verified' => $faker->boolean,
        'about' => $faker->paragraph,
        'location' => $faker->address,
    ];
});
