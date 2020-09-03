<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Curso;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

$factory->define(Curso::class, function (Faker $faker) {

    $name = $faker->sentence;
    $descripcion = $faker->paragraph;
    $slug = Str::slug($name, '-');

    return [
        'name' => $faker->sentence,
        'descripcion' => $faker->paragraph,
        'picture' => 'cursos/' . $faker->image('public/storage/cursos',1280,960, null, false),
        /* 'title' => $name, */
        /* 'description' => $descripcion, */
        /* 'slug' => $slug, */
        'profesor_id' => \App\Profesor::all()->random()->id,
        'categoria_id' => \App\Categoria::all()->random()->id,
        'nivel_id' => \App\Nivel::all()->random()->id,
        
        'status' => $faker->randomElement([2, 3])
    ];
});
