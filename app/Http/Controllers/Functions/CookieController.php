<?php
namespace App\Http\Controllers\Functions;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cookie;

class CookieController extends Controller
{
	#set cookie
	public function setCookie($key, $value)
	{
		return Cookie::make($key, $value);
	}
	#get cookie
	public function getCookie($key)
	{
		return Cookie::get($key);
	}
}
