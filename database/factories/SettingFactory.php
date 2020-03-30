<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Setting;
use Faker\Generator as Faker;

$factory->define(Setting::class, function (Faker $faker) {
    return [
        'name' => 'learing academy',
        'logo' =>  'logo.png',
        'favicon' =>  'favicon.png',
        'city' =>  'Cairo,Egypt',
        'address' => '123 good st nasr city',
        'phone' => '01206606921',
        'working_hours' => 'Mon to Fri 9am to 6pm',
        'email' => 'contact_us@learingacademy.com',
        'map' => 'map html will be here',
        'fb' => 'www.facebook.com',
        'twitter' => 'www.twitter.com',
        'insta' => 'www.insta.com',

    ];
});
