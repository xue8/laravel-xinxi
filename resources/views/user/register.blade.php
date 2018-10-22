<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>注册 - Biecheng 别城</title>
		<meta name="description" content="@yield('description')" />
    	<meta name="keywords" content="@yield('keyword')" />
    	<meta name="viewport" content="width=device-width, initial-scale=1" />    
    	<link rel="stylesheet" href="/static/css/user.css" />	
    	<link rel="stylesheet" href="/static/css/common.css" />	
    	<link rel="stylesheet" href="/static/css/header.css" />	    	
	</head>
	<body>	
		<div class="reg-contain" id="bie">
			<div class="reg-header">
				<div class="text-col h3">别城</div>
				<div class="text-col h5">别城遇知己</div>
			</div>
			<div class="reg-content">
				<form method="POST" action="#" onsubmit="return false">
					{{ csrf_field() }}
					<div class="input-wrapper">
						<input type="text" class="input-col" placeholder="请输入email" name="email" id="email" />
					</div>
					<div class="input-wrapper">
						<input type="password" class="input-col" placeholder="请输入密码" name="password" id="password" />
					</div>
					<div class="input-wrapper">
						<input type="password" class="input-col" placeholder="确认密码" id="password1"/>
					</div>	
					<div class="input-wrapper text-align-left">
						<input type="text" class="input-col input-captcha" placeholder="请输入验证码" name="captcha" id="captcha" />
						<img src="" class="captcha-img" onclick="getCaptcha()">
						<input type="text" name="captcha-key" id="captcha-key" style="display: none;"/>							
					</div>
					<div class="error-text">
						<p id="errorText"></p>
					</div>					
					<button class="button-col button-reg" onclick="reg()">注册</button>				
				</form>
			</div>
			<div class="reg-footer">
				<div class="text-col h5">
					<span style="color: #555;">已有账号？</span><a href="/login" id="biecheng">登录</a>
				</div>
			</div>
		</div>	
	</body>	
	<script type="text/javascript" src="/static/js/jquery.min.js" ></script>
	<script type="text/javascript" src="/static/js/jquery.cookie.js" ></script>	
	<script type="text/javascript" src="/static/js/captcha.js" ></script>	
	<script>
		function reg(){
			var pwd = $('#password').val();
			var pwd1 = $('#password1').val();
			if(pwd != pwd1)
			{
				$('#errorText').html('两次密码输入不一样！');
				return ;
			}
			var data = {
				'email': $('#email').val(),
				'password': $('#password').val(),
				'captcha': $('#captcha').val(),
				'captcha-key': $('#captcha-key').val(),
			}
			$.ajax({
				type:"POST",
				url:"/api/register",
				async:true,
				dataType:'json',
				data: data,
				success: function(res){
					$.cookie('biecheng_token', res.success.token);
					var status = res.success.status;
					window.location.href = '/emailActivation';
				},
				error: function(res){
					var errorText = '';
					$.each(res['responseJSON'], function(i, v){
						$.each(v, function(ii, vv) {
							errorText = errorText + vv[0];
						});
					});
					$('#errorText').html(errorText);
				}
			});	
			getCaptcha();		
		}
	</script>	
</html>
