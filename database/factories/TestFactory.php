<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Test;
use Faker\Generator as Faker;

$factory->define(Test::class, function (Faker $faker) {
    return [
        'name'  =>$faker->name,
        'spec'  =>$faker->randomElement($array = array ('front end','backend','ui design')),
        'desc' => $faker->paragraph,
        'img' => $faker->numberBetween(1,3) . ".png",

    ];
});
