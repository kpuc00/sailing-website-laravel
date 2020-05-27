<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Coach;
use Faker\Generator as Faker;

$factory->define(Coach::class, function (Faker $faker) {
    return [
        'firstName' => $faker->firstName,
        'lastName' => $faker->lastName,
        'description' => $faker->realText(),
        'course_id' => factory(\App\Course::class)->create(),
    ];
});
