<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Capitulo;
use Faker\Generator as Faker;

$factory->define(Capitulo::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence,
    ];
});
