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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', 'UsersfileController@index');
//Route::get('/add', 'UsersfileController@create');
Route::post('/add', 'UsersfileController@create')->name('file.add');
Route::get('/destroy/{id}', 'UsersfileController@destroy')->name('file.destroy');