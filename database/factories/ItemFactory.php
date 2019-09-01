<?php

use Faker\Generator as Faker;

$factory->define(App\Item::class, function (Faker $faker) {
    return [
        'title' => $faker->jobTitle,
        'details' => $faker->paragraph,
        'budget' => $faker->numberBetween(1, 15) * 100,
        'cents' => $faker->boolean ? 00 : 50,
        'images' => ["test/mapbox.jpg", "test/avatar.png", "test/mapbox.jpg", "test/mapbox.jpg"],
        'stock' => $faker->boolean ? $faker->numberBetween(0, 6) : null,
    ];
});
