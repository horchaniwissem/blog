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

Route::middleware('auth:api')->get('/user', 'App\Http\Controllers\Api\UserController@user');

Route::middleware('api')->get('/articles/{post}', 'App\Http\Controllers\Api\PostController@getComments');

Route::middleware('auth:api')->post('/comments/create', 'App\Http\Controllers\Api\CommentController@create');
