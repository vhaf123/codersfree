<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Home;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Storage;

$factory->define(Home::class, function (Faker $faker) {
    Storage::deleteDirectory('home');
    Storage::makeDirectory('home');

    return [
        'portada_picture' => 'home/' . $faker->image('public/storage/home',1280,960, null, false),
        'contenido_picture_1' => 'home/' . $faker->image('public/storage/home',460,263, null, false),
        'contenido_picture_2' => 'home/' . $faker->image('public/storage/home',460,263, null, false),
        'contenido_picture_3' => 'home/' . $faker->image('public/storage/home',460,263, null, false),
        'contenido_picture_4' => 'home/' . $faker->image('public/storage/home',460,263, null, false),
        'nuevo_contenido_picture' => 'home/' . $faker->image('public/storage/home',1000,667, null, false),
        'informacion_picture' => 'home/' . $faker->image('public/storage/home',811,821, null, false),
    ];
});
