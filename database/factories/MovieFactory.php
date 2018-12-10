<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Movie::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence($nbWords = 3, $variableNbWords = true),
        'year' => $faker->year($max = 'now'),
        'rate' => $faker->numberBetween($min = 3, $max = 10),
        'image' => 'https://i.ibb.co/zstQ4TL/fff.png',
        'description' => $faker->text($maxNbChars = 200)
    ];
});
