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

Route::get('http://XXXXXX.jp/XXX','XXX\AAAController@bbb'
);

Route::get('admin/profile/create','admin\ProfileController@add'
);

Route::get('admin/profile/edit','admin\ProfileController@edit'
);

