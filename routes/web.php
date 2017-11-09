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

Route::get('/weather', 'RestController@index');

// Search
Route::get('/weather/search/', 'RestController@search');

//User Auth
Auth::routes();
Route::get('/home', 'RestController@index');

//ratings
Route::get('/rating', 'RatingController@index');
Route::post('/rating', 'RatingController@store');
