<?php

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


Route::group(['prefix' => 'article', 'middleware' => 'auth'], function(){
    Route::get('index', 'ArticleController@index')->name('top');
});

// Route::resource('articles', 'ArticleController')->only([
//     'index', 'show'
// ]);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
