<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Requisito;
use Faker\Generator as Faker;

$factory->define(Requisito::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence
    ];
});
