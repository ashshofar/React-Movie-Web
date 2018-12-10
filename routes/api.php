<?php

use Illuminate\Http\Request;

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

Route::get('movie', 'MovieController@index');
Route::post('movie/store', 'MovieController@store');
Route::get('movie/show/{id}', 'MovieController@show');
Route::get('movie/update/{id}', 'MovieController@update');
Route::get('movie/delete{id}', 'MovieController@destroy');

Route::get('favorite', 'FavoriteController@index');
Route::post('favorite/store', 'FavoriteController@store');
Route::get('favorite/detele/{id}', 'FavoriteController@destroy');