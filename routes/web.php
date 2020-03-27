<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/ActivityType','ActivityTypeController@index');
Route::get('/ActivityType/{id}','ActivityTypeController@show');
Route::post('/ActivityType','ActivityTypeController@store');
Route::put('/ActivityType/{id}','ActivityTypeController@update');
Route::delete('/ActivityType/{id}','ActivityTypeController@destroy');

Route::get('Languages','LanguagesController@index');
Route::get('Languages/{id}','LanguagesController@show');
Route::post('Languages','LanguagesController@store');
Route::put('Languages/{id}','LanguagesController@update');
Route::delete('Languages/{id}','LanguagesController@destroy');
