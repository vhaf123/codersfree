<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Tema;
use Faker\Generator as Faker;

$factory->define(Tema::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence,
        'body' => $faker->text(5000),
        'description' => $faker->paragraph,
        'status' => 2
    ];
});
