<?php

use Faker\Generator as Faker;

$factory->define(App\Bio::class, function (Faker $faker) {
    return [
        'avatar' => 'test/avatar.png',
        'about' => $faker->paragraph,
        'location' => $faker->address,
    ];
});
