<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Model\Api\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
	#注册
	public function register(Request $request)
	{
//		print_r($request['email']);
//		return ;
		$validator = Validator::make($request->all(), [
			'email' => 'required|email|unique:users,email',
			'password' => 'required|',
		]);
		
		if($validator->fails())
		{
			return Response()->json(['error'=>$validator->errors()], 403);
		}
		
		#插入数据库
		$input = $request->all();
		$input['password'] = bcrypt($input['password']);
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
		]);
				
		if(Auth::attempt(['email'=>$request['email'], 'password'=>$request['password']]))
		{
			$user = Auth::User();
			$success['token'] = $user->createToken('WEB')->accessToken;
			$success['email'] = $request['email'];
			return Response()->json(['success'=>$success], 200);
		}else{
			return Response()->json(['error'=>'error'], 401);
		}	
	}
}
