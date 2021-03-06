<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//wyświetla wszystkie filmy
Route::get('/', 'VideosController@index');

//zapisuje nowy film do bazy
// Route::post('/videos', 'VideosController@store');

//wyświetla formularz dodawania nowego filmu
// Route::get('/videos/create', 'VideosController@create');

//wyświetla film o podanym id
// Route::get('/videos/{id}', 'VideosController@show');

Route::resource('videos', 'VideosController');

Route::auth();
