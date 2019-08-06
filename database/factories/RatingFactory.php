<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use App\Rating;
use Faker\Generator as Faker;

$factory->define(Rating::class, function (Faker $faker) {
    return [
        'user_id' => $faker,
        'book_id' => $faker,
        'rating' => $faker,
    ];
});
