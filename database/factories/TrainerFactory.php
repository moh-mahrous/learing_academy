<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Trainer;
use Faker\Generator as Faker;

$factory->define(Trainer::class, function (Faker $faker) {
    return [
        'name' =>$faker->name,
        'phone' =>$faker->e164PhoneNumber,
        'spec'  =>$faker->word,
        'img'  =>$faker->randomDigit . ".png",
    ];
});
