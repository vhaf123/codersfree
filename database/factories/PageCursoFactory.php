<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\PageCurso;
use Faker\Generator as Faker;

use Illuminate\Support\Facades\Storage;

$factory->define(PageCurso::class, function (Faker $faker) {

    

    return [
        'portada_picture' => 'cursos/' . $faker->image('public/storage/cursos',1536,1152, null, false),
        /* 'portada_picture' => $faker->imageUrl(1536, 1152), */
    ];
});
