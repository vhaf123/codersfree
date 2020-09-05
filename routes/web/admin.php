<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'AdminController@index')->name('admin.index');

Route::resource('home', 'HomeController')->only('index', 'update')->names('admin.home');
Route::resource('page/cursos', 'PageCursoController')->only('index', 'update')->names('page.cursos');
Route::resource('page/posts', 'PagePostController')->only('index', 'update')->parameters(['posts' => 'page_post'])->names('page.posts');

Route::resource('users', 'UserController')->except('create', 'store')->names('admin.users');

Route::resource('roles', 'RoleController')->names('admin.roles');

Route::resource('categorias', 'CategoriaController')->names('admin.categorias');

Route::resource('cursos', 'CursoController')->except('show')->names('admin.cursos');

Route::get('cursos/{curso}/metas', 'CursoController@metas')->name('admin.cursos.metas');
Route::get('cursos/{curso}/requisitos', 'CursoController@requisitos')->name('admin.cursos.requisitos');
Route::get('cursos/{curso}/modulos', 'CursoController@modulos')->name('admin.cursos.modulos');

Route::resource('metas', 'MetaController')->only('store', 'update', 'destroy')->names('admin.metas');

Route::resource('requisitos', 'RequisitoController')->only('store', 'update', 'destroy')->names('admin.requisitos');

Route::resource('modulos', 'ModuloController')->names('admin.modulos');

Route::resource('videos', 'VideoController')->except('index', 'create', 'show')->names('admin.videos');


//Manual

Route::get('manual-laravel-7', 'LaravelController@index')->name('admin.laravel');

Route::resource('temas', 'TemaController')->names('admin.temas');

//Blog

Route::resource('posts', 'PostController')->names('admin.posts');
Route::resource('tags', 'TagController')->names('admin.tags');