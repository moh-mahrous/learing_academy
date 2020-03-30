<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\SiteContent;
use Faker\Generator as Faker;

$factory->define(SiteContent::class, function (Faker $faker) {
    return [
        'name' => 'banner',
        'content' =>json_encode([
            'title' =>'Every student yearns to learn more',
            'subtitle' =>'Making Your Childs World Better',
            'desc' => "Replenish seasons may male hath fruit beast were seas saw you arrie said man beast whales his void unto last session for bite. Set have great you'll male grass yielding yielding man"

        ]),
    ];
});
