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
Route::put('/project/{id}/update', 'ProjectController@update');

Route::get('/project/{id}', 'ProjectController@show');
Route::get('/project/{id}/settings', 'ProjectController@edit');
Route::delete('/project/{id}', 'ProjectController@destroy');

// Comments
Route::post('/project/{projectId}/comment', 'CommentController@saveProjectComment');
Route::post('/project/{projectId}/group/{groupId}/comment', 'CommentController@saveGroupComment');

// Groups
Route::get('/project/{projectId}/group/new', 'GroupController@create');
Route::post('/project/{projectId}/group/new', 'GroupController@save');
Route::get('/project/{projectId}/group/{groupId}', 'GroupController@show');
Route::get('/project/{projectId}/group/{groupId}/settings', 'GroupController@edit');
Route::put('/project/{projectId}/group/{groupId}/update', 'GroupController@update');
Route::delete('/project/{projectId}/group/{groupId}', 'GroupController@destroy');

// Tasks
Route::post('/project/{projectId}/task/create', 'TaskController@save');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
