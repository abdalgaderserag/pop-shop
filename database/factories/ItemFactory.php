<?php

use Faker\Generator as Faker;

$factory->define(App\Item::class, function (Faker $faker) {
    return [
        'title' => $faker->jobTitle,
        'details' => $faker->paragraph,
        'budget' => $faker->numberBetween(1, 15) * 100 . $faker->boolean ? '.50' : '.00',
        'images' => '',
        'stock' => $faker->numberBetween(0, 6),
    ];
});
