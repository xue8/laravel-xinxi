<?php
namespace App\Http\Controllers\Functions;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Auth;
use Mail;
use Carbon\Carbon;
use Validator;
use App\Model\Api\User;
use App\Model\Api\Email_Access_Tokens as EAT;
use Illuminate\Support\Facades\Hash;

class Email extends Controller
{
	#send email
	public function sendEmail(Request $request)
	{
		$user = Auth::User();	
		$email = $user['email'];		
		$uid = $user['id'];		
		$created_at = Carbon::now();
		$expires_at = Carbon::now()->addHours(1);			
		$nowtimestamp = Carbon::now()->timestamp;
		//id加密
		$id = md5($nowtimestamp.$uid);
		$eat = new EAT;
		$eat->id = $id;
		$eat->uid = $uid;
		$eat->expires_at = $expires_at;
		$eat->save();
		
		$active = '注册';
		$data = ['email'=>$email, 'name'=>'新用户', 'uid'=>$uid, 'timestamp'=>$nowtimestamp, 'active'=>$active];
		$flag = Mail::send('functions.email', $data, function($message) use($data)
		{
		  $message->to($data['email'], $data['email'])->subject('账号激活 -biecheng');
		});	
		if(!$flag)
		{
			return Response()->json(['success'=>'error'], 200);			
		}
		return Response()->json(['success'=>'success'], 200);	
	}
	
	#check email
	public function checkEmail(Request $request)
	{
		$validator = Validator::make($request->all(),[
			'timestamp'	=> 'required|integer',
			'uid'	=> 'required|integer',
		]);		
		if($validator->fails())
		{
			$error = json_decode($validator->errors());
			return Response()->json(['error'=>$error], 403);
		}		
		
		$input = $request->all();	
		$nowtimestamp = (int)$input['timestamp'];
		$nowtime = Carbon::now()->toDateTimeString();
		$uid = (int)$input['uid'];
		#id加密
		$hashId = md5($nowtimestamp . $uid );
		$eat = EAT::where('id', $hashId)
					->where('expires_at', '>=', $nowtime)		
					->get()
					->first();
		if(!$eat)
		{
			return Response()->json(['error'=>'激活链接已超时，请重新发送激活链接！'], 401);
		}
		$id = $eat->uid;
		
		$user = User::where('id', $id)
					->get()
					->first();
		if(!$user)
		{
			return Response()->json(['error'=>'用户不存在！'], 401);
		}
		$user->status = 1;
		$user->save();
				
		return view('user.login');			
//		return Response()->json(['success'=>'success'], 200);			
	}
}
