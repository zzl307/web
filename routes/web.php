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

Auth::routes();
// 后台首页
Route::get('/home', function () {
	return redirect('news/index');
});

Route::group(['prefix' => 'news'], function () {
	// Route::group(['middleware' => 'can:site_overview'], function () {
		Route::any('index', 'NewController@home');
		Route::any('/store', 'NewController@store')->name('news.store');
		Route::any('/category', 'NewController@category')->name('news.category');
		Route::any('/category_store', 'NewController@categoryStore')->name('news.categoryStore');
		// Route::any('export', 'SiteController@export');
		// // API
		// Route::any('getSiteInfo', 'SiteController@getSiteInfo');
		// Route::any('syncSiteInfo', 'SiteController@syncSiteInfo');
		// Route::group(['middleware' => 'can:site_manage'], function () {
		// 	Route::any('setSiteAuthType', 'SiteController@setSiteAuthType');
		// 	Route::any('setSiteFlags', 'SiteController@setSiteFlags');
		// 	Route::any('deleteSites', 'SiteController@deleteSites');
		// 	Route::any('deleteSiteDevice', 'SiteController@deleteSiteDevice');
		// });
		// Route::any('getSiteName', 'SiteController@getSiteName');
		// Route::any('getSiteNameInfo', 'SiteController@getSiteNameInfo');
		// Route::any('stats', 'SiteController@stats');
		// Route::any('stats/search', 'SiteController@statsSearch');
		// // 场所统计导出
		// Route::any('siteExcel', 'SiteController@siteExcel');
		// // 场所管理
		// Route::any('siteManage', 'SiteController@siteManage');
		// // 场所管理修改
		// Route::any('editSiteManage', 'SiteController@editSiteManage');
		// // 场所管理删除
		// Route::any('deleteSiteManage/{name}', 'SiteController@deleteSiteManage');	
		// Route::any('getDeviceConfig', 'SiteController@getDeviceConfig');
		// // 历史记录
		// Route::any('siteLogs', 'SiteController@siteLogs');
	// });
});
    