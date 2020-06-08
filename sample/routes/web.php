<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

// /book に get リクエストが来たら BookController の index メソッドに処理を投げる
Route::get('book', 'BookController@index');
// パラメータを渡す場合
Route::get('book/{id}/edit', 'BookController@edit');

Route::get('book/{id}/show', 'BookController@show');

Route::put('book/{book}', 'BookController@update');

Route::delete('book/{id}', 'BookController@destroy');

Route::get('book/create', 'BookController@create');

Route::post('book', 'BookController@store');

Route::get('user/{id}', 'UserController@show');

Route::get('user', 'UserController@index');

Route::get('hr', 'MstHrController@index');
Route::get('hr/create', 'MstHrController@create');
Route::get('hr/{hr_cd}/edit', 'MstHrController@edit');
Route::post('hr', 'MstHrController@store');
Route::put('hr/{hr_cd}', 'MstHrController@update');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
