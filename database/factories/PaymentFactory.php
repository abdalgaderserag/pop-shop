<?php

use Faker\Generator as Faker;

$factory->define(App\Payment::class, function (Faker $faker) {
    return [
        'creditCardNumber' => $faker->creditCardNumber,
        'money' => $faker->numberBetween(1, 23) * 1000,
        'cents' => '' . ($faker->numberBetween(0, 1) ? $faker->numberBetween(0, 99) : 00),
    ];
});
