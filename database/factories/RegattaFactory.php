<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Regatta;
use Faker\Generator as Faker;

$factory->define(Regatta::class, function (Faker $faker) {
    return [
        'name' => $faker->text(),
    ];
});
