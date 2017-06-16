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

Route::get('/', 'HomeController@index');

Route::get('locations', 'LocationController@index')->name('locations');

Route::get('data', 'DataController@index')->name('data');

Route::group(['prefix' => 'api'], function() {
    Route::get('lastData/{hour}/{minute}', 'DataController@apiGetPossibleTimes');
    Route::get('intersectData/{hour1}/{minute1}/{hour2}/{minute2}', 'DataController@apiIntersectData');
    Route::get('data/{hour1}/{minute1}/{hour2}/{minute2}/{hourIntersect}/{minuteIntersect}/', 'DataController@apiGetCompareData');
});

Auth::routes();
