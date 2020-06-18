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
 Route::post('register', 'Auth\RegisterController');
 Route::post('login', 'Auth\LoginController');
 Route::post('logout', 'Auth\LogoutController');

 Route::namespace('Article')
 ->middleware('auth:api')
 ->group(function(){
    Route::post('create-new-article', 'ArticleController@store');
    Route::patch('update-the-article/{article}', 'ArticleController@update');
    Route::delete('delete-the-article/{article}', 'ArticleController@destroy');
 });

 Route::get('/articles/{article}', 'Article\ArticleController@show');
 Route::get('/articles', 'Article\ArticleController@index');


 Route::get('user', 'UserController');