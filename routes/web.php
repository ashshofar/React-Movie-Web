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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/config', 'TestController@config');
Route::get('/test', 'TestController@index');

Route::get('/{name}/{id}', 'TestController@exchange');

Route::get('/voucher', 'VoucherManagementController@index');
Route::get('/voucher/create', 'VoucherManagementController@create');
