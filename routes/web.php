<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/get-friends', 'HomeController@get_friends');
Route::post('/session/create', 'SessionController@create');
