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
Route::get('/user/college','ApiCollegeController@aa');
Route::get('/user/voc','ApiCollegeController@voc');
Route::get('/user/ethnic','ApiCollegeController@ethnic');
Route::get('/user/province','ApiCollegeController@province');
Route::get('/user/city','ApiCollegeController@city');
Route::get('/user/area','ApiCollegeController@area');
