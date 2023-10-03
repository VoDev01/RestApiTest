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
Route::group(['prefix' => 'v1'], function(){
    Route::get('/items', 'Api\V1\ItemController@index');
    Route::get('/items/show/{id}', 'Api\V1\ItemController@show');
    Route::post('/items/create', 'Api\V1\ItemController@create');
    Route::post('/items/update', 'Api\V1\ItemController@update');
    Route::post('/items/delete/{id}', 'Api\V1\ItemController@delete');
});