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

Route::middleware('auth')->group(function(){
    Route::post('/tweets','TweetController@store');
    Route::get('/tweets','TweetController@index')->name('home');

    Route::get('/profiles/{user:username}','ProfileController@show')->name('profile');
    Route::post('/profiles/{user:username}/follow','FollowController@store');
    Route::get('/profiles/{user:username}/edit','ProfileController@edit');
    Route::patch('/profiles/{user:username}','ProfileController@update')->middleware('can:edit,user');

    Route::get('/explore','ExploreController@index');

});

Auth::routes();

