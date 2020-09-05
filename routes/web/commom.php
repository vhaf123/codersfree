<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'HomeController@index')->name('home');

Route::resource('cursos', 'CursoController');
Route::post('cursos/{curso}/matricular', 'CursoController@matricular')->name('cursos.matricular');
Route::post('cursos/{curso}/review', 'CursoController@review')->name('cursos.review');

Route::get('course-status/{curso}', 'CourseStatusController@index')->name('course-status.index');
Route::post('course-status/avance/{curso}', 'CourseStatusController@avance')->name('course-status.avance');
Route::post('course-status/actual/{curso}', 'CourseStatusController@actual')->name('course-status.actual');
Route::post('course-status/cursado', 'CourseStatusController@cursado')->name('course-status.cursado');

Route::get('manual-laravel-7', 'LaravelController@index')->name('laravel.index');
Route::get('manual-laravel-7/{tema}', 'LaravelController@tema')->name('laravel.tema');


Route::resource('blog', 'PostController')->parameters(['blog' => 'post'])->names('posts');
Route::resource('tags', 'TagController');

Route::get('contactanos', 'ContactanosController@index')->name('contactanos.index');
Route::post('contactanos/mensaje', 'ContactanosController@mensaje')->name('contactanos.mensaje');

Route::get('politicas', function () {
    return view('politicas');
})->name('politicas');

Route::get('terminos', function () {
    return view('terminos');
})->name('terminos');

//File manager
Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});