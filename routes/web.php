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

Route::get('/', 'Index\IndexController@index');
Route::get('search', 'Functions\SearchController@search');
Route::get('register', function(){
	return view('/user/register');
});
Route::get('login', function () {
	return view('/user/login');
});
//邮件激活发送页面
Route::get('emailActivation', function () {
	return view('/user/emailActivation');
});

#会员中心
Route::namespace('User')->group(function () {
	Route::get('/u/home', 'UserController@home');
	Route::get('/new/question', 'UserController@postQuestion');
	Route::get('/new/article', 'UserController@postArticle');
	Route::get('/u/{id}', 'UserController@getUserInfoView');
});

//问答
Route::get('/question', 'Question\ColumnController@column');
Route::get('/question/{column_erji}', 'Question\ColumnController@column_erji');
Route::get('/q/{id}', 'Question\QuestionController@question');
//专栏
Route::get('/zhuanlan', 'Zhuanlan\ColumnController@column');
Route::get('/zhuanlan/{column_erji}', 'Zhuanlan\ColumnController@column_erji');
Route::get('/a/{id}', 'Zhuanlan\ArticleController@article');