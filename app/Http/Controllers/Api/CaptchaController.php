<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

class CaptchaController extends Controller
{
	#api取验证码
	function captcha()
	{
		$res = app('captcha')->create('default', true);
    	return $res;
	}
	#api验证认证码
	function check_captcha()
	{
		
	}
}
