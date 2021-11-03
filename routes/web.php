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

//削除
Route::get('/{name}/del/{id}', 'UserPageController@del')->name('userpage_del')->middleware('auth');
//編集
Route::get('/{name}/edit/{id}', 'UserPageController@edit')->name('userpage_edit')->middleware('auth');
Route::post('/{name}/edit', 'UserPageController@update');
//個別ページを表示
Route::get('{name}','UserPageController@index')->name('user_page')->middleware(UserMiddleware::class);