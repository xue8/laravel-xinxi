<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>@yield('title')</title>
		<meta name="description" content="@yield('description')" />
    	<meta name="keywords" content="@yield('keyword')" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />    	
    	<link rel="stylesheet" href="/static/css/header.css" />
    	<link rel="stylesheet" href="/static/css/font-awesome.min.css">	      	
    	@yield('css')		
	</head>
	<body>
		<div class="global-nav clearfix">
			<nav class="container height-auto">
				<div class="nav-left">
					<div class="header-logo">
						<h1>
							<a href="\" class="color-green">Biecheng</a>
						</h1>
					</div>
					<div class="menu hidden-menu">
						<ul class="menu-list hidden-menu-list" style="float: left;">
							@foreach($nav as $n)
							<li class="menu-item">
								<a href="\{{ $n->cname }}">{{ $n->name }}</a>
							</li>
							@endforeach
						</ul>
						<form class="header-search" onsubmit="getsearch();">
							<input placeholder="搜索问题或关键字" type="text" id="keyword"/>
							<a class="fa fa-search" style="margin-left: -25px;"></a>
						</form>
					</div>
				</div>
				<div class="nav-right">
					<ul class="menu-list">
						<li class="menu-item dropdown-avatar">
							<a class="user-avatar" data-toggle="dropdown" href="#"></a>
							<div class="dropdown-avatar-menu">
								<a href="/new/question">提问题</a>								
								<a href="/new/article">写文章</a>
								<a href="/u/home">信息设置</a>
							</div>
						</li>
					</ul>
				</div>			
			</nav>
			<nav class="bottom-nav">
				<div class="opts">
					<a href="/" class="fa fa-home">首页</a>
					<a href="/question" class="fa fa-question">问答</a>
					<a href="/zhuanlan" class="fa fa-paper-plane color-green">专栏</a>
					<a class="fa fa-user-circle">我的</a>
					<ul class="opts-my">
						<li>
							<a href="/new/question">提问题</a>
						</li>
						<li>
							<a href="/new/article">写文章</a>
						</li>
						<li>
							<a href="/u/home">信息设置</a>
						</li>						
					</ul>
				</div>
			</nav>			
		</div>
		<div class="header-tag">
			<div class="container clearfix ht-auto">
				<div class="col-md-middle htag">
					<ul class="tag-ul">
						@foreach($nav_erji_zhuanlan as $n)
						<li class="tag-li">
							<a href="/zhuanlan/{{ $n->cname }}">{{ $n->name }}</a>
						</li>
						@endforeach
					</ul>
				</div>
				<div class="col-md-right">
					<div class="col-md-right-s col-md-right-s-i">
						<div class="box-top clearfix ht-auto">
							<ul class="menu-list hidden-menu-list menu-list-i">
								<li class="menu-item fa fa-question-circle-o menu-item-i">
									<a href="/new/question">提问答</a>
								</li>
								<li class="menu-item fa fa-file-o menu-item-i">
									<a href="/new/article">写文章</a>
								</li>
								<li class="menu-item fa fa-user-circle-o menu-item-i">
									<a href="/u/home">用户+</a>
								</li>
							</ul>
						</div>
					</div>
				</div>							
			</div>
		</div>			
		@yield('main')
		<div class="container">
			<div class="footer">
<!--				<span>我是footer</span>-->
			</div>
		</div>		
	</body>
	<script type="text/javascript" src="/static/js/jquery.min.js" ></script>	
	<script>
		$('.user-avatar').click(function () {
			$('.dropdown-avatar-menu').show();
			event.stopPropagation();//阻止冒泡
		});
		$('body').click(function () {
			$('.opts-my').hide();
			$('.dropdown-avatar-menu').hide();
		});
		$('#box').click(function () {
			return false;
		});	
		
		$('.fa-user-circle').click(function () {
			$('.fa-paper-plane').attr('class', 'fa fa-paper-plane');
			$('.fa-user-circle').attr('class', 'fa fa-user-circle color-green');
			$('.opts-my').show();
			event.stopPropagation();//阻止冒泡
		});
				
		function getsearch()
		{
				window.event.returnValue=false; 
				window.location.href = '/search?query=' + $('#keyword').val();
		}
	</script>	
	@yield('js')	
</html>
