<?php

/** @var Factory $factory */

use App\Like;
use App\Quiz;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(Like::class, function (Faker $faker) {
    $likeable = [
        Quiz::class
    ];

    $likeableType = $faker->randomElement($likeable);
//    $likeableObj = factory($likeableType)->create();

    return [
        'likeable_type' => $likeableType,
        'likeable_id' => $faker->numberBetween(1, 1000),
        'user_id' => $faker->numberBetween(1, 500)
    ];
});
