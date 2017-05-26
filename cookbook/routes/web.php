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
Route::get('/cerrarSesion', 'userController@cerrarSesion');

Route::group(['prefix' => 'user'], function(){
	Route::get('/newsFeed', 'userController@newsFeed');
	Route::get('/profile', 'userController@profile');
	Route::get('/cookbook', 'userController@cookbook');
	Route::get('/follow', 'userController@follow');
	Route::get('/follower', 'userController@follower');
	Route::get('/recipe', 'userController@recipe');
	Route::get('/newRecipe', 'nuevaRecetaController@newRecipe');
	Route::post('/nuevaReceta', 'nuevaRecetaController@agregarReceta');
	Route::get('/editarReceta/{idReceta}', 'nuevaRecetaController@editarReceta');
	Route::post('/editarReceta', 'nuevaRecetaController@editarRecetaBD');
	Route::get('/search', 'userController@search');
	Route::post('/editarPerfil', 'userController@editarPerfil');
});

Route::post('/registro', 'registroController@agregarUser');
Route::post('/login', 'indexController@login');


Route::get('login', function () {
});