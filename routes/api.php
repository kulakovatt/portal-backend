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
Route::post('/booking', 'App\Http\Controllers\BookingController@ticket_reserv');
Route::post('/submit-test', 'App\Http\Controllers\TestController@add_test_result');
Route::post('/add-review', 'App\Http\Controllers\ReviewController@add_review');
Route::post('/success-review', 'App\Http\Controllers\ReviewController@success_review');
Route::post('/failure-review', 'App\Http\Controllers\ReviewController@failure_review');
Route::post('/add-tours', 'App\Http\Controllers\ToursController@add_tours');
Route::post('/edit-tours', 'App\Http\Controllers\ToursController@edit_tours');
Route::post('/delete-tours', 'App\Http\Controllers\ToursController@delete_tours');
Route::post('/get-points', 'App\Http\Controllers\TestController@get_points_users');

Route::get('/get-reviews','App\Http\Controllers\ReviewController@get_reviews');
Route::get('/get-admin-reviews','App\Http\Controllers\ReviewController@all_admin_reviews');
Route::get('/get-passangers','App\Http\Controllers\AdminController@all_passangers');
Route::post('/get_info','App\Http\Controllers\AccountController@get_info');
Route::get('/get_tours_select','App\Http\Controllers\BookingController@tours_for_select');
Route::get('/tours','App\Http\Controllers\ToursController@all_tours');
Route::post('/get-tour','App\Http\Controllers\ToursController@get_tour_info_by_id');
Route::get('/image','App\Http\Controllers\ToursController@get_images');
