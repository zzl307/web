<?php

use Illuminate\Support\Facades\Auth;
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

// 首页
Route::get('/', 'StaticPagesController@index')->name('index');
// 列表
Route::get('newsList/{id}', 'StaticPagesController@news')->name('news.list');
// 详情
Route::get('details/{id}/{slug?}', 'StaticPagesController@details')->name('details');

Auth::routes();

// 后台首页
Route::get('/home', function(){
	return redirect('news/index');
});

Route::group(['prefix' => 'news'], function(){
	// Route::group(['middleware' => 'can:site_overview'], function () {
		Route::any('index', 'NewController@home');
		Route::any('/store', 'NewController@store')->name('news.store');
		Route::any('/category', 'NewController@category')->name('news.category');
		Route::any('/category_store', 'NewController@categoryStore')->name('news.categoryStore');
		Route::any('getNewsInfo', 'NewController@getNewsInfo');
		Route::any('deleteNews', 'NewController@deleteNews');
		Route::post('upload_image', 'NewController@uploadImage')->name('news.upload_image');
		Route::any('newStore', 'NewController@newStore');
	// });
});

// 系统设置
Route::group(['prefix' => 'system'], function(){
	Route::any('banner', 'SystemController@index')->name('system.banner');
	Route::any('stroe', 'SystemController@store')->name('banner.store');
	Route::any('storeStutas', 'SystemController@storeStutas')->name('banner.storeStutas');
	Route::any('deleteDanners', 'SystemController@deleteDanners')->name('banner.deleteDanners');
});

Route::get('sitemap', 'SitemapController@index')->name('sitemap.index');
Route::get('sitemap.xml', 'SitemapController@index')->name('sitemap.index');
