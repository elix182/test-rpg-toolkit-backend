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

Route::group(['prefix' => 'hero'], function () {
    Route::get('', 'HeroController@list');
    Route::get('random', 'HeroController@random');
    Route::get('dashboard', 'HeroController@dashboard');
    Route::get('{id}', 'HeroController@find');
    Route::post('', 'HeroController@create');
    Route::delete('{id}', 'HeroController@delete');
    Route::put('{id}', 'HeroController@edit');
  
    Route::middleware('auth:api')->group(function () {
    });
});

Route::group(['prefix' => 'monster'], function () {
    Route::get('', 'MonsterController@list');
    Route::get('random', 'MonsterController@random');
    Route::get('dashboard', 'MonsterController@dashboard');
    Route::get('{id}', 'MonsterController@find');
    Route::post('', 'MonsterController@create');
    Route::delete('{id}', 'MonsterController@delete');
    Route::put('{id}', 'MonsterController@edit');
});