<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Meta;
use Faker\Generator as Faker;

$factory->define(Meta::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence
    ];
});
