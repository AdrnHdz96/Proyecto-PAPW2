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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', 'indexController@index');
Route::get('/registro', 'indexController@registro');

Route::group(['prefix' => 'user'], function(){
	Route::get('/newsFeed', 'userController@newsFeed');
});


Route::get('login', function () {
});