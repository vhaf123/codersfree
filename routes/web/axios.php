<?php

use Illuminate\Support\Facades\Route;

use App\Curso;
use App\Modulo;
use App\Video;


Route::get('axios/cursos/{curso}', function (Curso $curso) {
    return $curso->modulos;
})->name('axios.cursos.show');

Route::get('axios/cursos/{curso}/metas', function (Curso $curso) {
    return $curso->metas()->latest()->get();
})->name('axios.cursos.metas');

Route::get('axios/cursos/{curso}/requisitos', function (Curso $curso) {
    return $curso->requisitos()->latest()->get();
})->name('axios.cursos.requisitos');

Route::get('axios/cursos/{curso}/modulos', function (Curso $curso) {
    return $curso->modulos()->latest()->get();
})->name('axios.cursos.modulos');

Route::get('axios/videos/{video}/edit', function (Video $video) {
    return $video;
})->name('axios.videos.edit');