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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/hallpass', 'HallpassController@store')->name('store');
Route::post('/approve','HallpassController@approve')->name('approve');
Route::post('/deny','HallpassController@destroy')->name('destroy');
Route::get('/all','HallpassController@all')->name('all');
Route::get('/user-hallpass-list/{id}','HallpassController@list')->name('list');
