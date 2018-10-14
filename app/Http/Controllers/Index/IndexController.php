<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use App\Http\Controllers\Functions\CookieController;
use Illuminate\Support\Facades\Cookie;
use App\Model\Que_Question;
use App\Model\Api\User;

class IndexController extends Controller
{
	public function index()
	{		
		$questions = Que_Question::where('id', 'like', '%')->orderBy('id','desc')->get()->take(15);
		$data = ['question'=>$questions];
		return view('index.index')->with('data', $data);
	}
}
