<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>邮箱激活  - Biecheng 别城</title>
		<meta name="description" content="@yield('description')" />
    	<meta name="keywords" content="@yield('keyword')" />
    	<meta name="viewport" content="width=device-width, initial-scale=1" />    
    	<link rel="stylesheet" href="/static/css/user.css" />	
    	<link rel="stylesheet" href="/static/css/common.css" />	
    	<link rel="stylesheet" href="/static/css/header.css" />	    	
	</head>
	<body>	
		<div class="reg-contain" id="bie" style="height: 305px;">
			<div class="reg-header" style="height: 35px; padding-top: 60px;">
				<div class="text-col h5 content-aa">您的邮箱尚未激活，请激活后再登录。</div>
			</div>
			<div class="reg-content">	
				<button class="button-col button-reg" onclick="sendEmail()">点击发送激活邮件</button>				
			</div>
			<div class="reg-footer">
				<div class="text-col h5">
					<span style="color: #555;">注：邮箱为您注册时候填写的邮箱，如需修改请联系管理员。</span>
				</div>
			</div>
		</div>	
	</body>	
	<script type="text/javascript" src="/static/js/jquery.min.js" ></script>
	<script type="text/javascript" src="/static/js/jquery.cookie.js" ></script>	
	<script type="text/javascript" src="/static/js/captcha.js" ></script>	
	<script>
		getUserInfo();
		
		var token = $.cookie('biecheng_token');
		function sendEmail(){
			$.ajax({
				type:"GET",
				url:"/api/email",
				async:true,
				dataType:'json',
				headers:{
				   "Authorization": "Bearer " + token,
				},				
				success: function(res){
					//$.cookie('biecheng_token', res.success);
					$('.reg-content').hide();
					$('.reg-footer').hide();
					$('.content-aa').text('激活链接已发送，请登录邮箱激活！');
					$('.reg-contain').attr('style', 'height:150px; font-size: 20px');
					//window.location.href = '/';
				},
				error: function(res){
					
				}
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
					
				},
				error: function(res){
					window.location.href = '/login';
				},
			});		
		}
		
		function checkEmail()
		{
			var data = {
				'id': $('#code').val(),
			}
			var token = $.cookie('biecheng_token');
			$.ajax({
				type: "POST",
				url: "/api/checkEmail",
				async: true,
				data: data,
				dataType: 'json',
				headers:{
				   "Authorization": "Bearer " + token,
				},
				success: function(res){
					console.log(res);
				},
				error: function(res){
					console.log(res);
					//window.location.href = '/login';
				},
			});				
		}		
	</script>	
</html>
