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

/*Route::get('/', 'App\Http\Controllers\PostController@index');*/

Auth::routes();

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', 'App\Http\Controllers\FrontController@index')->name('front.index');
Route::get('/article/{slug}', 'App\Http\Controllers\FrontController@article')->name('front.posts.show');
Route::get('/tag/{slug}', 'App\Http\Controllers\TagController@show')->name('front.tags.show');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->group(function () {
    Route::resource('posts', '\App\Http\Controllers\PostController');
});


