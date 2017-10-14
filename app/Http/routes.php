<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Route::get('/', 'WelcomeController@index');

// Route::get('home', 'HomeController@index');

// Route::controllers([
// 	'auth' => 'Auth\AuthController',
// 	'password' => 'Auth\PasswordController',
// ]);

// Home 模块
Route::group(['namespace' => 'Home'],function() {
	// 首页
	Route::get('/','IndexController@index');
	Route::get('article','ArticleController@index');
});

// Home 模块下的三级模式
Route::group(['namespace' => 'Home','prefix' => 'home'],function() {
	Route::group(['prefix' => 'index'],function() {
		Route::get('index/{id}','IndexController@index');
	});
});

// Admin 模块
Route::group(['namespace' => 'Admin' ,'prefix' => 'admin' ,'middleware' => 'admin'],function() {
	// 文章管理
	Route::group(['prefix' => 'article'],function() {
		// 文章列表
		Route::get('index','ArticleController@index');
		// 发布文章
		Route::get('create','ArticleController@create');
	});

	// 分类管理
	Route::group(['prefix' => 'category'],function() {
		// 分类列表
		Route::get('index','CategoryController@index');
		// 添加分类
		Route::get('create','CategoryController@create');
	});
});
