<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Question;
use Faker\Generator as Faker;

$factory->define(Question::class, function (Faker $faker) {
    return [
        'quiz_id' => $faker->numberBetween(1, 1000),
        'order' => $faker->numberBetween(0, 100),
        'title' => $faker->text(15) . "?",
        'answer_0' => $faker->paragraph,
        'answer_1' => $faker->paragraph,
        'answer_2' => $faker->paragraph,
        'answer_3' => $faker->paragraph,
        'correct' => $faker->numberBetween(0, 3)
    ];
});
