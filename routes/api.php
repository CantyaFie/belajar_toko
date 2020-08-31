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
Route::get('/customer', 'CustomerController@show');
Route::post('/customer', 'CustomerController@store');

Route::get('/product', 'ProductController@show');
Route::post('/product', 'ProductController@store');

Route::get('/orders', 'OrdersController@show');
Route::get('/orders/{id_orders}', 'OrdersController@detail');
Route::post('/orders', 'OrdersController@store');