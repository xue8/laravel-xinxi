body-mac@extends('user.master')

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
				<form action="#" method="POST" onsubmit="return false;">
					{{ csrf_field() }}
					<div class="mac-text fa fa-address-book-o fa-lg">
						昵称
					</div>
					<div class="mac-input-wrap">
						<input type="" name="nickname" id="nickName" value="" class="mac-input" />
					</div>
					<div class="mac-text fa fa-pencil fa-lg">
						个性签名
					</div>
					<div class="mac-input-wrap">
						<input type="" name="signnature" id="signNature" value="" class="mac-input" />
					</div>
					<div class="mac-text fa fa-intersex fa-lg">
						性别
					</div>
					<div class="mac-input-wrap" style="text-align: center !important;">
						<label class="mac-radio-wrap">
							<input type="radio" value="0" class="mac-radio" id="sex0" name="sex"/>男
						</label>	
						<label class="mac-radio-wrap">
							<input type="radio" value="1" class="mac-radio" id="sex1" name="sex"/>女
						</label>
						<label class="mac-radio-wrap">
							<input type="radio" value="2" class="mac-radio" id="sex2" name="sex"/>保密	
						</label>				
					</div>	
					<div class="mac-text">
					</div>					
					<div class="mac-input-wrap" style="border: 2px solid #d6d6d6; border-radius: 15px;">
						<button class="mac-button" style="border-radius: 15px;" onclick="postUserInfo()">保存</button>
					</div>																		
				</form>
			</div>
		</div>
	</div>
</div>
@endsection

@section('js')
<script type="text/javascript" src="/static/js/jquery.min.js" ></script>
<script type="text/javascript" src="/static/js/jquery.cookie.js" ></script>	
<script>
	window.onload = function() {
		getUserInfo();
		$('input[type="radio"]').click(function () {
			$('input[type="radio"]').prop('checked');
			$('input[type="radio"]').attr('checked', false);
			$(this).attr('checked', true);
			$(this).prop('checked', true);
		});
	}
	function getUserInfo()
	{
		var token = $.cookie('biecheng_token');
		$.ajax({
			type: "GET",
			url: "/api/userInfo",
			async: true,
			dataType: 'json',
			headers:{
			   "Authorization": "Bearer " + token,
			},
			success: function(res){
				var data = res.success;
				//账号未激活
				var status = res.success.status;
				if( status == 0)
				{
					window.location.href = '/emailActivation';
				};				
				$('#nickName').val(data.nickname);
				$('#signNature').val(data.signnature);
				$('#sex' + data.sex).attr('checked', 'checked');
			},
			error: function(res){
				window.location.href = '/login';
			},
		});		
	}
	
	function postUserInfo()
	{
		var token = $.cookie('biecheng_token');
		var data = {
			'nickname': $('#nickName').val(),
			'signnature': $('#signNature').val(),
			'sex': $('input[name="sex"][checked]').val(),
		};
		$.ajax({
			type: "POST",
			url: "/api/userInfo",
			async: true,
			data: data,
			dataType: 'json',
			headers:{
			   "Authorization": "Bearer " + token,
			},
			success: function(res){
				if( res.success )
				{
					$('.message').show();
				}
				//window.location.href = '/u/home';
			},
			error: function(res){
				console.log(res);
				window.location.href = '/login';
			},
		});				
	}
</script>
@endsection

