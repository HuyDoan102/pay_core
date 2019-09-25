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
Route::group(['middleware' => 'api', 'namespace' => 'Api'], function() {
    Route::group(['prefix' => 'users', 'as' => 'users.'], function () {
        Route::get('/', 'UserController@index')->name('index');
        Route::post('/store', 'UserController@store')->name('store');
    });
    Route::group(['prefix' => 'documents', 'as' => 'documents.'], function() {
        Route::get('/', 'DocumentController@index')->name('index');
        Route::get('/file-json', 'DocumentController@getFile')->name('getFile');
    });
});
