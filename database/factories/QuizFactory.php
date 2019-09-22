<?php

/** @var Factory $factory */

use App\Quiz;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(Quiz::class, function (Faker $faker) {
    return [
        "user_id" => $faker->numberBetween(1, 500),
        "title" => $faker->text(15),
        "description" => $faker->paragraph,
        "category_id" => $faker->numberBetween(1,5),
        "play_count" => $faker->numberBetween(0, 50000)
    ];
});
