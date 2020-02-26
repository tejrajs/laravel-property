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

Route::get('/properties/suburb/{suburb}', 'PropertyController@suburb')->name('get-property-analytic-suburb');
Route::get('/properties/state/{state}', 'PropertyController@state')->name('get-property-analytic-suburb');
Route::get('/properties/country/{country}', 'PropertyController@country')->name('get-property-analytic-suburb');
Route::post('/property', 'PropertyController@store')->name('create-property');
Route::post('/property/analytic', 'AnalyticController@store')->name('create-property-analytic');
Route::put('/property/analytic/{id}', 'AnalyticController@update')->name('put-property-analytic');
Route::patch('/property/analytic/{id}', 'AnalyticController@update')->name('patch-property-analytic');
Route::get('/property/analytic/{id}', 'AnalyticController@index')->name('get-property-analytic');
Route::get('/property/analytic/suburb/{suburb}', 'AnalyticController@index')->name('get-property-analytic');
