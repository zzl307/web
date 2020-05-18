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

// 首页
Route::get('/', 'StaticPagesController@index')->name('index');
// 列表
Route::get('news', 'StaticPagesController@news')->name('news');
// 详情
Route::get('details', 'StaticPagesController@details')->name('details');
