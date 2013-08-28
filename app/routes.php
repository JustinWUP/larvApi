<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
| Named routes ftw.
|
*/

Route::get('/', 'HomeController@showWelcome');

#User Routes
Route::get('user/new', 'UserController@newUser');
Route::get('user/edit/{id}', 'UserController@editUser');
Route::post('user/create', 'UserController@createUser');
Route::post('user/update/{id}', 'UserController@updateUser');
Route::get('user/destroy/{id}', 'UserController@destroyUser');
#User JSON Response
Route::post('user',  'UserController@showJSON');