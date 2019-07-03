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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/register', 'Api\UserController@register');
Route::post('/login', 'Api\UserController@login');

Route::apiResource('post', 'Api\PostController')
    ->except([
        'index'
    ])
    ->middleware('auth:api');

Route::get('post', 'Api\PostController@index');

Route::get('/my-posts', 'Api\PostController@getMine')->middleware('auth:api');