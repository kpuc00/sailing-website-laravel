<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Competitor;
use Faker\Generator as Faker;

$factory->define(Competitor::class, function (Faker $faker) {
    return [
        'firstName' => $faker->firstName,
        'lastName' => $faker->lastName,
        'age' => $faker->numberBetween(10, 30),
        'club' => $faker->word,
        'regatta_id' => factory(\App\Regatta::class)->create(),
    ];
});
