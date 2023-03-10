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
Route::get('/', 'App\Http\Controllers\TopController@index');
Route::get('/user', 'App\Http\Controllers\UserController@index');
Route::get('/history', 'App\Http\Controllers\HistoryController@index');
Route::get('/login', 'App\Http\Controllers\LoginController@index');
Route::get('/sentence', 'App\Http\Controllers\SentenceController@index');
Route::get('/setting', 'App\Http\Controllers\SettingController@index');