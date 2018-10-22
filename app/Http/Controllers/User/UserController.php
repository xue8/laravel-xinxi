<?php
	
namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Model\Que_Column;
use App\Model\Que_Question;
use Illuminate\Http\Request;
use App\Model\Api\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
	#会员中心
	public function home(){
		return view('user.home');
	}
	
	#提问题
	public function postQuestion()
	{
		return view('user.newQuestion');
	}
	
	#发表新文章
	public function postArticle()
	{
		return view('user.newArticle');
	}	
	
	#查看用户信息
	public function getUserInfoView()
	{
		return view('user.userInfoView');
	}
	//邮件激活链接
	public function checkEmail(Request $request)
	{
//		print_r($request->headers);
//		return ;		
//		header('WWW-Authenticate: Negotiate');
//      $user = Auth::User();  
//      return response()->json(['success' => $user]);  
//		$headers = $request->header('Authorization');
//		print_r($headers);
//      $user = new User;
//      return ;
//      return response()->json(['success' => '$user']);
//		//$user['status'] = 1;
//		print_r($user);
//		return ;
//		return Response()->json(['success'=>'success'], 200);
	}
}
