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
    Route::get('articles/create', 'ArticleController@create')->name('articles.create');
    Route::post('articles/create', 'ArticleController@store')->name('articles.store');
    Route::get('/articles/{id}/show', 'ArticleController@show')->name('articles.show');
});

// Route::resource('articles', 'ArticleController')->only([
//     'index', 'show'
// ]);


