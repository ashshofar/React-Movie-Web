<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Favorite::class, function (Faker $faker) {
    return [
        'movie_id' => $faker->numberBetween($min = 1, $max = 50)
    ];
});
