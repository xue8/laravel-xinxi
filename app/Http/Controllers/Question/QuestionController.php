<?php

namespace App\Http\Controllers\Question;

use App\Http\Controllers\Controller;
use App\Model\Que_Question;
use App\Model\Que_Content;
use App\Model\Que_Column;
use App\Http\Controllers\Functions\CookieController;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class QuestionController extends Controller
{
	#文章详情页
	public function question($id)
	{
		#统计浏览量
		$cookie = new CookieController();
		$c = $cookie->getCookie('question');
		$questionId = explode(',', $c);
		$questionArr = null;
		foreach($questionId as $arr)
		{
			if($arr == $id)
			{
				break;
			}
			$questionArr = $questionArr . $arr . ',';			
			if($arr == end($questionId))
			{
				$questionArr = $questionArr . $id;
				$newCookie = $cookie->setCookie('question', $questionArr);
				$pageView = Que_Question::where('id', $id)->get()->first();
				$pageView->pageviews = $pageView->pageviews + 1;
				$pageView->save();
			}
		}
		
		if(!isset($newCookie))
		{
			$newCookie = urlencode($c);
		}
		
		$question = Que_Question::where('id', $id)->get()->first();
		$content = Que_Content::where('id', $question->cid)->get()->first();
		$column = Que_Column::where('id', $question->cnid)->get()->first();
		$keywordStr = $question->keyword;
		$keywordArr = explode(',', $keywordStr);
		$data = ['question'=>$question, 'content'=>$content, 'column'=>$column, 'keywordArr'=>$keywordArr];
		return Response(view('question.question')
						->with('data',$data)
						)
			->cookie($newCookie);
	}
}
