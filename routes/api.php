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
    Route::post('login', 'AuthController@login')->name('login');
    Route::post('register', 'AuthController@register')->name('register');
    Route::group(['middleware' => 'jwt.auth'], function() {
        Route::group(['prefix' => 'auth', 'as' => 'auth.'], function() {
            Route::post('logout', 'AuthController@logout')->name('logout');
            Route::post('refresh', 'AuthController@refresh')->name('refresh');
            Route::get('me', 'AuthController@me')->name('me');
        });
        Route::group(['prefix' => 'users', 'as' => 'users.'], function () {
            Route::get('/', 'UserController@index')->name('index');
            Route::post('/store', 'UserController@store')->name('store');
        });
    });
    Route::group(['prefix' => 'documents', 'as' => 'documents.'], function() {
        Route::get('/', 'DocumentController@index')->name('index');
        Route::get('/get-file', 'DocumentController@getFile')->name('getFile');
    });
});
