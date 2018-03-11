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
Route::get('/profile/delete/{id}', 'ProfileController@borrarUsuario')->middleware('auth');
Route::get('/coches/create', 'CochesController@create')->middleware('auth');
Route::get('/administrar', 'CochesController@vercochescreados')->middleware('auth');
Route::get('/administrar/delete/{id}', 'CochesController@deleteCoche')->middleware('auth');

Route::get('/administrar/editarcoche/{id}', 'CochesController@edit')->middleware('auth');
Route::put('/administrar/update/{id}', 'CochesController@update')->middleware('auth');


Route::get('/coches', 'CochesController@show');
Route::get('/coches/{tipo}', 'CochesController@showtipos');

Route::get('/coches/buscar/{id}', 'CochesController@detalle');
Route::post('/coches/create', 'CochesController@store')->middleware('auth');

Route::get('/user/{user}', 'UsersController@buscar');

Route::get('/profile/', 'ProfileController@index')->name('auth');


Route::get('/profile/edit', 'UsersController@profile')->name('profile');
Route::get('/profile/account', 'UsersController@edit')->name('profile.account');
Route::patch('/profile/account', 'UsersController@update');
Route::get('/profile/password', 'UsersController@edit')->name('profile.password');
Route::patch('/profile/password', 'UsersController@update');
Route::get('/profile/avatar', 'UsersController@edit')->name('profile.avatar');

Route::get('/conversations/{conversation}', 'UsersController@showConversation')->name('conversation.show');
Route::post('/{user}/dms', 'UsersController@sendPrivateMessage');





Auth::routes();

Route::get('/', 'HomeController@index')->name('home');



