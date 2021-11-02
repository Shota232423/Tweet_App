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
use App\Http\Middleware\UserMiddleware;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');
Route::post('/home', 'HomeController@tweet');

// マイページ
Route::get('/mypage', 'MypageController@index')->name('mypage')->middleware('auth');
//削除
Route::get('/mypage/del/{id}', 'MypageController@del')->name('mypage_del')->middleware('auth');
//編集
Route::get('/mypage/edit/{id}', 'MypageController@edit')->name('mypage_edit')->middleware('auth');
Route::post('/mypage/edit', 'MypageController@update');

//テスト
Route::get('{name}','UserPageController@index')->middleware(UserMiddleware::class);