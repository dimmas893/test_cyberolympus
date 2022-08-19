<?php

use Illuminate\Support\Facades\Auth;
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
    return view('halo');
});


Route::get('/welcome', 'HomeController@welcome');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/show', 'HomeController@show')->name('show');
Route::get('/home/create', 'HomeController@create')->name('create');
Route::post('/home/store', 'HomeController@store')->name('customor-store');
Route::get('/home/edit/{id}', 'HomeController@edit')->name('customor-edit');
Route::post('/home/update/{id}', 'HomeController@update')->name('customor-update');
Route::delete('/home/delete/{id}', 'HomeController@delete')->name('customor-delete');


Route::get('/show', 'HomeController@show')->name('show');
