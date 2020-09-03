<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

use App\Capitulo;

$factory->define(Capitulo::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence,
    ];
});
