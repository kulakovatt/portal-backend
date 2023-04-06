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


Route::post('/register', 'App\Http\Controllers\RegistController@register');
Route::post('/auth', 'App\Http\Controllers\AuthController@auth');
Route::post('/info', 'App\Http\Controllers\AccountController@info');

Route::get('/get_info','App\Http\Controllers\AccountController@get_info');
Route::get('/tours','App\Http\Controllers\ToursController@all_tours');
Route::get('/image','App\Http\Controllers\ToursController@get_images');
