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

Route::get('/', 'HomeController@index');

Route::get('/new', 'ProjectController@create');
Route::post('/new', 'ProjectController@save');
Route::put('/p/{id}/update', 'ProjectController@update');

Route::get('/p/{id}', 'ProjectController@show');
Route::get('/p/{id}/settings', 'ProjectController@edit');
Route::delete('/p/{id}', 'ProjectController@destroy');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
