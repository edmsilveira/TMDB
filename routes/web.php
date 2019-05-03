<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('welcome');
});

Route::get('/search', function () {
    return view('search');
});

Route::get('/modal', function () {
    return view('/modal');
});

Route::get('/ladom', function () {
    return view('/ladom');
});

Route::get('/where', function () {
    return view('where');
});

Route::resource('posts', 'PostsController');