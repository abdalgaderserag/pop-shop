<?php

use Faker\Generator as Faker;

$factory->define(App\Cart::class, function (Faker $faker) {
    return [
        'item' => $faker->jobTitle,
        'amount' => $faker->numberBetween(1,5),
    ];
});
