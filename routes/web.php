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
Route::get('/', 'FrontController@index');
Route::get('/data/airport', 'FrontController@airport')->name('data.airport');
Route::get('/schedules', 'FrontController@schedules');
Route::get('/schedule/{id}', 'FrontController@schedule')->name('schedule');

Route::group(['middleware' => 'auth:admin','prefix' => 'admin', 'as' => 'admin'], function() {
	routeController('dashboard', 'Admin\AdminController');

});

Route::post('callback', 'User\CallbackController@callback')->name('callback');
