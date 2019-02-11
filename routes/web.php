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

Route::get('/', 'TaskController@index');
Route::post('/task', 'TaskController@store');
Route::delete('/task/{id}', 'TaskController@destroy');
Route::get('/task/show/{task}', 'TaskController@show');
Route::get('/task/find/{id}', 'TaskController@find');

Auth::routes();

Route::get('/home', 'HomeController@index');
