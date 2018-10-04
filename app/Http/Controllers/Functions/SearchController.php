<?php

namespace App\Http\Controllers\Functions;

use App\Http\Controllers\Controller;
use App\Model\Que_Question;
use App\Model\Que_Column;
use Illuminate\Http\Request;

class SearchController extends Controller
{
	#搜索
	public function search(Request $request)
	{
		$questions = Que_Question::where('title', 'like', '%' . $request['query'] . '%')
								->orWhere('keyword', 'like', '%' . $request['query'] . '%')
								->orderBy('id','desc')
								->paginate(20);		
		$data = ['question'=>$questions, "query"=>$request['query']];
		return view('functions.searchresult')->with('data', $data);
	}
}
