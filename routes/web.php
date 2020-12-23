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

/*Route::get('http://XXXXXX.jp/XXX','XXX\AAAController@bbb'
);*/

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
     Route::get('news/create', 'Admin\NewsController@add');
     Route::post('news/create', 'Admin\NewsController@create'); # 追記
     Route::get('news','Admin\NewsController@index')->middleware('auth');//追記
     Route::get('news/edit', 'Admin\NewsController@edit')->middleware('auth'); // 追記
     Route::post('news/edit', 'Admin\NewsController@update')->middleware('auth'); // 追記
     Route::get('news/delete', 'Admin\NewsController@delete')->middleware('auth');

});


Route::get('admin/profile/create','Admin\ProfileController@add'
)->middleware('auth');
Route::get('admin/profile/edit','Admin\ProfileController@edit'
)->middleware('auth');
Route::post('admin/profile/create' , 'Admin\ProfileController@create');

//登録したニュースデータを更新
Route::get('admin/profile/edit', 'Admin\ProfileController@edit')->middleware('auth'); 




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'NewsController@index');
Route::get('/profile', 'ProfileController@index');
