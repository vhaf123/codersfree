<?php

use Illuminate\Support\Facades\Route;

Route::get('search/home', 'SearchController@home')->name('search.home');
Route::get('search/cursos', 'SearchController@cursos')->name('search.cursos');
Route::get('search/posts', 'SearchController@posts')->name('search.posts');