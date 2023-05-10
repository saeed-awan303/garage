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
Route::post('fetch-models', 'frontend\Homecontroller@fetchModel');
Route::post('fetch-fuel', 'frontend\Homecontroller@fetchFuel');
Route::post('fetch-profile', 'frontend\Homecontroller@fetchProfile');
Route::post('fetch-rim', 'frontend\Homecontroller@fetchRim');
Route::post('fetch-speed', 'frontend\Homecontroller@fetchSpeed');
