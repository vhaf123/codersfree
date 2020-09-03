<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('login/{driver}', 'Auth\LoginController@redirectToProvider');
Route::get('login/{driver}/callback', 'Auth\LoginController@handleProviderCallback');