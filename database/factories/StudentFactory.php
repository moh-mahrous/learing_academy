<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Student;
use Faker\Generator as Faker;

$factory->define(Student::class, function (Faker $faker) {
    return [
        'name'  =>$faker->name,
        'email' =>$faker->freeEmail,
        'spec'  =>$faker->randomElement($array = array ('eng','dr','pro')),
        
    ];
});
