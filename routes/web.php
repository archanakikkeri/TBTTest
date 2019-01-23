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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/','UserController@index');
Route::post('/collegelist','UserController@collegelist');
Route::get('/edit_college/{id}','UserController@edit_college');
Route::get('/delete_college/{id}','UserController@delete_college');
Route::post('/update_college','UserController@update_college');