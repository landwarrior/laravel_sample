<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
// このファイルは api としてのアクセスがあった場合に使用される
// これを使うと /api の URI が自動的にプレフィックスにつくらしい
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
