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
		return Response(
					view('index.index')
					);
	}
}
