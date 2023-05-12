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
Route::post('fetch-models', 'Frontend\HomeController@fetchModel');
Route::post('fetch-fuel', 'Frontend\HomeController@fetchFuel');
Route::post('fetch-profile', 'Frontend\HomeController@fetchProfile');
Route::post('fetch-rim', 'Frontend\HomeController@fetchRim');
Route::post('fetch-speed', 'Frontend\HomeController@fetchSpeed');
Route::post('fetch-categories','Frontend\HomeController@fetchCategories');
Route::post('fetch-category','Frontend\HomeController@getCategory');

