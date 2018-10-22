<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class SetToken
{
    /**
     * 处理传入的请求
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {  	
    	//设置token到请求头
    	$request->headers->set('Authorization', 'Bearer 1eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjU1NzE4MDU2MzIwMzRlNjZkNTBlNmY4NDIyNmM0Y2I1MmUwNGZhMGM2MmQzNDlhMTc0ZDdjOGM1ZjY3ODcyMDBhMDc1ZGE5ODQwNmM4YjNhIn0.eyJhdWQiOiIxIiwianRpIjoiNTU3MTgwNTYzMjAzNGU2NmQ1MGU2Zjg0MjI2YzRjYjUyZTA0ZmEwYzYyZDM0OWExNzRkN2M4YzVmNjc4NzIwMGEwNzVkYTk4NDA2YzhiM2EiLCJpYXQiOjE1NDAxMTU1MTMsIm5iZiI6MTU0MDExNTUxMywiZXhwIjoxNTcxNjUxNTEzLCJzdWIiOiIxNiIsInNjb3BlcyI6W119.SUxf3OznZ0nWCeIw5EElAvL1a5Fhq6WkKYiTXuxTFwXQVYpI9l8C7-UyJXXka6lRSzRYA4Tf6oCiOxv1UxUl9p-vD-1oMK4pYCsHCDHLXUh2SKMQROEcdyJp--Fxd2KF0fjlfvmwJobcCa2cIaNgdXylxUOenm32IlJvZ--izTOg9GfQxH2uFH0swGNTCOaLnGmkjJIp69oA-3NckGl-e-aKGZf_Lk_P5xGNgY_uTNPX1yWg4xxARUs7fPgE140quB2eUXRpg8rraiQGrE176AFL2STW2vk89DouKJVqVUDwwQH1GlmtGZJxUpkjtQI4TGRaskLp_4p27zr20NNS5YQBtCYMFp0WatKuI0nlYR1mvvF7fmbsf0s36cQZGq3cK39tn6uZPCOvsbrOjCFEnFsE1OcsWTbzctnvERoUM5cE3npbWUkSuUyh-r3cBIlqHFMlYHUPDe62E8JvFfeowhgHNWAe4K42toenHdVxXY3Amg7f2ylNGhmcv4pHHZ-sKkd1Y8t1dlNti1A-MuBABXuDSHv7QmImM40VUF-BFG1bM0nBQh4gLgfzoHq4r3K9sgFQ-JdHM68NvF2KAV0VSdB2oq4FNDRVkfixdBP07ItM-dofrpb0nhRLyjLSzhuUg8IeAQbWLZWD5j04I8EYNaD27t2hGMPidUYetzoX8RA'); 
    	return $next($request);    	
    	
//  	$authorization = $request->header('Accept');
//  	print_r($authorization);
//	    if($authorization = $request->header('Accept')) 
//	    { 
//	    	$request->headers->set('Authorization', $authorization); 
//	    }   	
    	
//  	return 403;
//      if(Auth::check()){
//          $user = Auth::user();
//          print_r('2');
//          if ($user->status != 1) {
//              return abort(403);
//          }
//      }
    }

}