<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use App\Http\Controllers\Functions\CookieController;
use Illuminate\Support\Facades\Cookie;

class IndexController extends Controller
{
	public function index()
	{
		$cookie = new CookieController();		
		//return 	$response->cookie('question', '4,1,2,3');
		//$c = Response('2')->cookie('question', '4,1,2,3');
		$c = $cookie->setCookie('question', '4,1,2,3');	
		return $c;
		
		//$d = $cookie->getCookie('laravel_session');
		//return $d;	
		//$a = Response('2')->withCookie('question', '4,1,2,3');
		//$c = Cookie::make('question', '4,1,2,3');
		
		//$c = $response->cookie('question', '4,1,2,3');
		return Response()
			->view('index.index')
			->cookie($c);
	}
}
