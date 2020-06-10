<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Announcement::class, function (Faker $faker) {
    return [
        'title' => $faker->text(20),
        'content' => $faker->paragraph(),
        'user_id' => factory(\App\User::class)->create(),
        'image' => 'default.png',
    ];
});
