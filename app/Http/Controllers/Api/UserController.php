<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Model\Api\User;
use Illuminate\Support\Facades\Auth;
use Captcha;
use Illuminate\Routing\Redirector;
use App\Model\Que_Question;
use App\Model\Que_Content;
use App\Model\Api\QueArticle;

class UserController extends Controller
{
	#注册
	public function register(Request $request)
	{
		$validator = Validator::make($request->all(), [
			'email' => 'required|email|unique:users,email',
			'password' => 'required|',
			'captcha' => 'required|captcha_api:' . $request->input('captcha-key'),
		],['email.email' => '邮箱格式不正确！',
		   'email.unique' => '该邮箱已注册！',
		   'email.required' => '请输入邮箱！',
		   'password.required' => '请输入密码！',
		   'captcha.required' => '请输入验证码！',
		   'captcha.captcha_api' => '验证码不正确！',
		]
		);
		
		if($validator->fails())
		{
			$error = json_decode($validator->errors());
			return Response()->json(['error'=>$error], 403);
		}
		
		#插入数据库
		$input = $request->all();
		$input['password'] = bcrypt($input['password']);
		$input['status'] = 0;
		$user = User::create($input);
		#创建Token
		$success['token'] = $user->createToken('WEB')->accessToken;
		$success['email'] = $user->email;
		
		return Response()->json(['success'=>$success], 200);
	}
	
	#登录
	public function login(Request $request)
	{
		$validator = Validator::make($request->all(),[
			'email'	=> 'required|email',
			'password' => 'required',
			'captcha' => 'required|captcha_api:' . $request->input('captcha-key'),			
		],['email.email' => '邮箱格式不正确！',
		   'email.required' => '请输入邮箱！',
		   'password.required' => '请输入密码！',
		   'captcha.required' => '请输入验证码！',
		   'captcha.captcha_api' => '验证码不正确！',
		]);
		
		if($validator->fails())
		{
			$error = json_decode($validator->errors());
			return Response()->json(['error'=>$error], 403);
		}		
				
		if(Auth::attempt(['email'=>$request['email'], 'password'=>$request['password']]))
		{
			$user = Auth::User();
			$success['token'] = $user->createToken('WEB')->accessToken;
			$success['email'] = $request['email'];
			$success['status'] = $user['status'];
			return Response()->json(['success'=>$success], 200);
		}else{
			return Response()->json(['error'=>['error'=>['密码不正确！'] ] ], 401);
		}	
	}
	
	#获取用户信息
	public function getUserInfo()
    {
        $user = Auth::User();  
        return response()->json(['success' => $user]);
    }
    
    #更新用户信息
 	public function updateUserInfo(Request $request)
    {
		$validator = Validator::make($request->all(),[
			'nickname'	=> 'max:20',
			'signnature' => 'max:256',
			'sex' => 'integer|max:2',			
		],['nickname.max' => '昵称字数超过限制！',
		   'signnature.max' => '个性签名字数超过限制！',
		   'sex.integer' => '性别不对！外星人？',
		   'sex.max' => '性别不对！外星人？',
		]);
		
		if($validator->fails())
		{
			$error = json_decode($validator->errors());
			return Response()->json(['error'=>$error], 403);
		}
		
		#更新数据库
		$input = $request->all();
		$user = Auth::User();	
		$user->nickname = $input['nickname'];
		$user->signnature = $input['signnature'];
		$user->sex = $input['sex'];
		$user->save();
		
        return response()->json(['success' => $user], 200);
    }   
    
    #重定向
    public function redirect()
    {
    	return Response()->json(['error' => 'nologin'], 401);
    }
    
    #发布问题
    public function postQuestion(Request $request)
    {
		$validator = Validator::make($request->all(),[
			'title'	=> 'required',
			'keyword' => 'required',
			'content' => 'required',
			'cnid' => 'required',	
			'describes' => 'describes',		
		],['title.required' => '请输入标题！',
		   'content.required' => '请输入内容！',
		   'keyword.required' => '没有选择关键词！',
		   'cnid.required' => '请选择问答类型！',
		]);   
		
		$input = $request->all();
		$user = Auth::User();	
		$input['uid'] = $user->id;
		$input['pageviews'] = 0;	
		#插入内容
		$input['cid'] = \DB::table('que_content')->insertGetId(
		    ['content' => $input['content'] ]
		);		
		
    	$question = new Que_Question;
    	$question->cnid = $input['cnid'];
    	$question->cid = $input['cid'];
    	$question->title = $input['title'];
    	$question->keyword = $input['keyword'];
    	$question->pageviews = $input['pageviews'];
    	$question->describes = $input['describes'];
    	$question->uid = $input['uid'];
    	$question->save();
    	
    	$qid = Que_Question::where('cid', $input['cid'])->take(1)->get();
    	$qid = $qid[0];
    	$qid = $qid->id;
    	
    	return response()->json(['success' => $qid], 200);
    }
    
    #发布文章
    public function postArticle(Request $request)
    {
		$validator = Validator::make($request->all(),[
			'title'	=> 'required',
			'keyword' => 'required',
			'content' => 'required',
			'cnid' => 'required',	
			'describes' => 'required',	
			'original' => 'required',	
		],['title.required' => '请输入标题！',
		   'content.required' => '请输入内容！',
		   'keyword.required' => '没有选择关键词！',
		   'cnid.required' => '请选择问答类型！',
		]);   
		
		$input = $request->all();
		$user = Auth::User();	
		$input['uid'] = $user->id;
		$input['pageviews'] = 0;	
		#插入内容
		$input['cid'] = \DB::table('que_article_content')->insertGetId(
		    ['content' => $input['content'] ]
		);		
		
    	$question = new QueArticle;
    	$question->cnid = $input['cnid'];
    	$question->cid = $input['cid'];
    	$question->title = $input['title'];
    	$question->keyword = $input['keyword'];
    	$question->pageviews = $input['pageviews'];
    	$question->describes = $input['describes'];
    	$question->uid = $input['uid'];
    	$question->original = $input['original'];
    	$question->save();
    	
    	$qid = QueArticle::where('cid', $input['cid'])->take(1)->get();
    	$qid = $qid[0];
    	$qid = $qid->id;
    	
    	return response()->json(['success' => $qid], 200);
    }    
	
}
