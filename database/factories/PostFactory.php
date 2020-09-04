<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;

use Illuminate\Support\Facades\Storage;

$factory->define(Post::class, function (Faker $faker) {

    return [
        'blogger_id' => \App\Blogger::all()->random()->id,
        'categoria_id' => \App\Categoria::all()->random()->id,
        'name' => $faker->sentence,
        'descripcion' => $faker->text(200),
        'body' => $faker->text(10000),
        'picture' => 'posts/' . $faker->image('public/storage/posts',1280,960, null, false),
        /* 'picture' => $faker->imageUrl(1280, 960), */
        'status' => 2,
    ];
});
