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
//		$content = Que_Content::where('id', $question->cid)->get()->first();
//		$column = Que_Column::where('id', $question->cnid)->get()->first();
		#tag
		$keywordStr = $question->keyword;
		$keywordArr = explode(',', $keywordStr);
		
		#相似问题
		#获取所有关键词的相关问答
		$similarQuestionArr = [];
		foreach($keywordArr as $k)
		{
			$similarQuestionArr_1 = Que_Question::where('keyword', 'like', '%' . $k . '%')->get()->toArray();
			$similarQuestionArr = array_merge($similarQuestionArr, $similarQuestionArr_1);
		}
		#只保留关键词和$similarQuestionArr索引id
		$similarQuestionArrKeyword = array_column($similarQuestionArr, 'keyword');
		#遍历所有关键词 将含有该关键词的问答id入栈
		$similarQuestionArrId = [];
		foreach($keywordArr as $k)
		{
			foreach($similarQuestionArrKeyword as $kid=>$s)
			{
				if(strstr($s, $k))
				{
					array_push($similarQuestionArrId, $kid);
				}
			}	
		}
		#根据问答出现次数进行排序
		$similarQuestionArrId = array_count_values($similarQuestionArrId);
		arsort($similarQuestionArrId);
		#取6个相关问答推荐
		$similarQuestionArrResult = [];
		foreach($similarQuestionArrId as $kid=>$s)
		{
			if(!in_array($similarQuestionArr[$kid]['id'], $similarQuestionArrResult) && $similarQuestionArr[$kid]['id'] != $id)
			{
				array_push($similarQuestionArrResult, $similarQuestionArr[$kid]['id']);
			}
			if(count($similarQuestionArrResult) > 5)
			{
				break ;
			}
		}
		$similarQuestionArrResult_1 = [];
		foreach($similarQuestionArrResult as $s)
		{
				$q = Que_Question::where('id', $s)->get()->first();
				array_push($similarQuestionArrResult_1, $q);
		}
		
		//$data = ['question'=>$question, 'content'=>$content, 'column'=>$column, 'keywordArr'=>$keywordArr, 'similarQuestionArr'=>$similarQuestionArrResult_1];
		$data = ['question'=>$question, 'keywordArr'=>$keywordArr, 'similarQuestionArr'=>$similarQuestionArrResult_1];		
		return Response(view('question.question')
						->with('data',$data)
						)
			->cookie($newCookie);
	}
}
