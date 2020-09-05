<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\PagePost;
use Faker\Generator as Faker;

$factory->define(PagePost::class, function (Faker $faker) {
    return [
        'picture' => 'posts/' . $faker->image('public/storage/posts',640,480, null, false),
    ];
});
