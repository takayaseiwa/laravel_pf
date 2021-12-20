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

use App\Http\Controllers\ArticleController;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//一覧画面へ遷移
Route::get('/index', 'ArticleController@index')->name('index');

# ゲストユーザーログイン
Route::get('guest', 'Auth\LoginController@guestLogin')->name('login.guest');

Auth::routes();

//HERO投稿
Route::group(['middleware' => 'auth'], function(){
    Route::get('/articles/create', 'ArticleController@create')->name('articles.create');
    Route::post('/articles/create', 'ArticleController@store')->name('articles.store');
    Route::get('/articles/{id}/edit', 'ArticleController@edit')->name('articles.edit');
    Route::post('/articles/{id}/edit', 'ArticleController@update')->name('articles.update');
    Route::get('/articles/{id}/delete', 'ArticleController@destroy')->name('articles.delete');
});

Route::resource('articles', 'ArticleController', ['only' => ['show']]);

//マイページ
Route::group(['middleware' => 'auth'], function(){
    Route::get('/users', 'UserController@show')->name('users.mypage');
    Route::get('/users/{id}/edit', 'UserController@edit')->name('users.edit');
    Route::post('/users/{id}', 'UserController@update')->name('users.update');
});
//検索画面
Route::group(['middleware' => 'auth'], function(){
    Route::get('/show', 'SearchController@show')->name('search.show');
    Route::get('/search', 'SearchController@search')->name('article.search');
});
//コメント投稿
Route::group(['middleware' => 'auth'], function(){
    Route::resource('comment', 'CommentController', ['only' => ['store', 'destroy']]);
});


