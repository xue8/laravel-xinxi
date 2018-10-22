<?php
	
namespace App\Http\Controllers\Api\Common;

use App\Http\Controllers\Controller;
use App\Model\Api\WebBasicInfo;
use App\Model\Api\QuestionComment;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Auth;
use App\Model\Api\User;

class WebCommonController extends Controller
{
	#获取社区状况信息
	public function getWebBasicInfo()
	{
		$WebBasicInfo = WebBasicInfo::get()->last();
		return Response()->json(['success' => $WebBasicInfo ], 200);
	}
	
	#获取问答评论
	public function getComment(Request $request)
	{
		$validator = Validator::make($request->all(),[
			'qid'	=> 'required',
			'perpagenum' => 'required',  //每一页的数量
			'cnid' => 'required',   //第几页
		],['qid.required' => '问答ID不能为空！',
		]);
		
		$input = $request->all();		
		$comment = QuestionComment::where('qid', $input['qid'])
									->where('cnid', $input['cnid'])
									->orderBy('id','desc')
									->paginate($input['perpagenum']);
		
		return Response()->json(['success' => $comment ], 200);
	}
	
	#评论问答、文章
	public function postComment(Request $request)
	{
		$validator = Validator::make($request->all(),[
			'qid'	=> 'required',
			'content' => 'required', 
			'cnid'	  => 'required',
		],['qid.required' => '问答ID不能为空！',
		]);

		$input = $request->all();
		$user = Auth::User();
		$input['uid'] = $user->id;					
		
		$comment = new QuestionComment;
		$comment->uid = $input['uid'];
		$comment->qid = $input['qid'];
		$comment->content = $input['content'];
		$comment->cnid = $input['cnid'];
		$comment->save();
		
		return Response()->json(['success' => 'success' ], 200);				
	}
	
	//查看用户信息
	public function getUserInfoView(Request $request)
	{
		$uid = $request['uid'];
		$user = User::where('id', $uid)
					->take(1)
					->get()
					->toArray();
		if(!$user)
		{
			return Response()->json(['error' => 'error' ], 401);	
		}
		$success['id'] = $user[0]['id'];
		$success['signnature'] = $user[0]['signnature'];
		$success['nickname'] = $user[0]['nickname'];
		$success['created_at'] = $user[0]['created_at'];
		return Response()->json(['success' => $success ], 200);				
	}
}

