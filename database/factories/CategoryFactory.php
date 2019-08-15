<?php

use Faker\Generator as Faker;

$factory->define(App\Category::class, function (Faker $faker) {
    return [
        'base_type' => config('pop.category[' . $faker->numberBetween(0, 5) . ']'),
        'seconder_type' => $faker->jobTitle,
        'location' => $faker->address,
        'exchangeable' => $faker->boolean,
        'used' => $faker->boolean,
    ];
});
