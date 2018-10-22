@extends('user.master')

@section('title', '用户中心  - Biecheng 别城')
@section('description', 'Biecheng开发者社区')
@section('keyword', '编程交流、IT技术、技术问答、技术博客、开源、代码')

@section('css')
<link rel="stylesheet" type="text/css" href="/static/css/googleapis.css">
<link rel="stylesheet" type="text/css" href="/static/css/common.css">		
<link rel="stylesheet" type="text/css" href="/static/css/index.css">	
<style>
    html, body {
        /*background-color: #fff;
        color: #636b6f;*/
/*        font-family: 'Raleway', sans-serif;*/
        /*font-weight: 100;
        height: 100vh;*/
        margin: 0;
    }
</style>
@endsection

@section('main')
<div class="wrapper" style="margin-top: 10px;">
	<div class="container clearfix ht-auto">
		<div class="col-md-middle">
			<div class="header-mac">
				<span class="header-mac-dot-wrap">
					<span class="header-mac-dot header-mac-dot-red"></span>
					<span class="header-mac-dot header-mac-dot-yellow"></span>
					<span class="header-mac-dot header-mac-dot-green"></span>
				</span>
				<div class="header-mac-title fa fa-address-book-o">
					设置
				</div>
			</div>
			<div class="message">
				<span class="fa fa-bell-o">设置已成功保存</span>
			</div>
			<div class="body-mac">
				<div class="mac-text fa fa-pencil fa-lg">
					正在施工......
				</div>																										
			</div>
		</div>
	</div>
</div>
@endsection

@section('js')
<script type="text/javascript" src="/static/js/jquery.min.js" ></script>
<script type="text/javascript" src="/static/js/jquery.cookie.js" ></script>	
<script>
//	getUserInfo();
//	function getUserInfo()
//	{
//		var uidStr = window.location.pathname;
//		var uidArr = uidStr.split('/');
//		var uid = uidArr[2];
//		var data = {
//			'uid': uid,
//		};
//		$.ajax({
//			type: "GET",
//			url: "/api/userInfoView",
//			async: true,
//			data: data,
//			dataType: 'json',
//			success: function(res){
//				var data = res.success;
////				console.log(data);
////				return;
//				$('#signNature').val(data.signnature);
//				$('#nickname').val(data.nickname);
//			},
//			error: function(res){
////				window.location.href = '/login';
//			},
//		});		
//	}
</script>
@endsection

