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
		$tag = $request['tag'];
		$query = $request['query'];
		#tag
		if(isset($tag))
		{
			$questions = Que_Question::where('keyword', 'like', '%' . $tag . '%')
									->orderBy('id', 'desc')
									->paginate(20);
			$data = ['results'=>$questions, "query"=>$tag, 'type'=>'tag'];									
		}
		#搜索
		if(isset($query))
		{
			$questions = Que_Question::where('title', 'like', '%' . $request['query'] . '%')
									->orWhere('keyword', 'like', '%' . $request['query'] . '%')
									->orderBy('id','desc')
									->paginate(20);		
			$data = ['results'=>$questions, "query"=>$query, 'type'=>'query'];			
		}
//		return 'false';
//		if($request['tag'])
//		$questions = Que_Question::where('title', 'like', '%' . $request['query'] . '%')
//								->orWhere('keyword', 'like', '%' . $request['query'] . '%')
//								->orderBy('id','desc')
//								->paginate(20);		
//		$data = ['results'=>$questions, "query"=>$request['query']];
		return view('functions.searchresult')->with('data', $data);
	}
}
