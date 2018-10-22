<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
#重定向
Route::get('redirect', 'Api\UserController@redirect')->name('login');

Route::GET('/webBasicInfo', 'Api\Common\WebCommonController@getWebBasicInfo');
Route::GET('/comment', 'Api\Common\WebCommonController@getComment');
Route::GET('/userInfoView', 'Api\Common\WebCommonController@getUserInfoView');

#邮件激活确认
Route::GET('/checkEmail', 'Functions\Email@checkEmail');		
#用户中心
Route::middleware('auth:api')->group(function () {
	#获取用户信息
	Route::GET('/userInfo', 'Api\UserController@getUserInfo');
	#修改用户信息
	Route::POST('/userInfo', 'Api\UserController@updateUserInfo');	
	#发布问题
	Route::POST('/new/question', 'Api\UserController@postQuestion');
	#发布文章
	Route::POST('/new/article', 'Api\UserController@postArticle');	
	#问答回复
	Route::POST('/comment', 'Api\Common\WebCommonController@postComment');
	#邮件发送
	Route::GET('/email', 'Functions\Email@sendEmail');		
});

#获取验证码
Route::GET('captcha', 'Api\CaptchaController@captcha');
//Route::POST('check_captcha', 'Api\CaptchaController@check_captcha');

Route::POST('register', 'Api\UserController@register');
Route::POST('login', 'Api\UserController@login');
