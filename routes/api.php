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
Route::post('login', 'API\UserController@login');
Route::post('register', 'API\UserController@register');

Route::get('deals', 'ApiController@getAllDeals');
Route::get('deals/{id}', 'ApiController@getDeal');
Route::post('deals', 'ApiController@createDeal');
Route::put('deals/{id}', 'ApiController@updateDeal');
Route::delete('deals/{id}','ApiController@deleteDeal');


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
