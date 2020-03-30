<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Course;
use Faker\Generator as Faker;

$factory->define(Course::class, function (Faker $faker) {
    return [
        'name' =>'course'. $faker->word,
        'cat_id' =>$faker->numberBetween(1,3),
        'trainer_id'=>$faker->numberBetween(1,10),

        'small_desc'=> $faker->sentence,
        'desc' => $faker->paragraph,
        'price' =>$faker->randomNumber(4),
        'img'  =>$faker->randomDigit . ".png",
    ];
});
