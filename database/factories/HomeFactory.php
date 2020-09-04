<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Home;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Storage;

$factory->define(Home::class, function (Faker $faker) {

    return [
        'portada_picture' => 'home/' . $faker->image('public/storage/home',1280,960, null, false),
        'contenido_picture_1' => 'home/' . $faker->image('public/storage/home',460,263, null, false),
        'contenido_picture_2' => 'home/' . $faker->image('public/storage/home',460,263, null, false),
        'contenido_picture_3' => 'home/' . $faker->image('public/storage/home',460,263, null, false),
        'contenido_picture_4' => 'home/' . $faker->image('public/storage/home',460,263, null, false),
        'nuevo_contenido_picture' => 'home/' . $faker->image('public/storage/home',1000,667, null, false),
        'informacion_picture' => 'home/' . $faker->image('public/storage/home',811,821, null, false),

        /* 'portada_picture' => $faker->imageUrl(1280, 960),
        'contenido_picture_1' => $faker->imageUrl(460, 263),
        'contenido_picture_2' => $faker->imageUrl(460, 263),
        'contenido_picture_3' => $faker->imageUrl(460, 263),
        'contenido_picture_4' => $faker->imageUrl(460, 263),
        'nuevo_contenido_picture' => $faker->imageUrl(1000, 667),
        'informacion_picture' => $faker->imageUrl(811, 821), */
    ];
});
