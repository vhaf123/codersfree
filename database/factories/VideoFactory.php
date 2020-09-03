<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Video;
use Faker\Generator as Faker;

$factory->define(Video::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence,
        'descripcion' => $faker->paragraph,
        'url' => 'https://youtu.be/Jocj2U_MlH0',
        /* 'iframe' => "<iframe width='560' height='315' src='https://www.youtube.com/embed/lm2qS9_B9L8' frameborder='0' allow='accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture' allowfullscreen></iframe>" */
    ];
});
