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


//Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');
Route::get('/logout', 'App\Http\Controllers\HomeController@logout')->name('logout');

Route::get('/login/google', 'App\Http\Controllers\Auth\LoginController@redirectToGoogleProvider')->name('google.login');

Route::get('login/google/callback', 'App\Http\Controllers\Auth\LoginController@handleProviderGoogleCallback');

Route::resource('home', 'App\Http\Controllers\HomeController');
Route::post('/upload_file', 'App\Http\Controllers\DriveController@uploadFile')->name('upload_file');

