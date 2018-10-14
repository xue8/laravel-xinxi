<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>@yield('title')</title>
		<meta name="description" content="@yield('description')" />
    	<meta name="keywords" content="@yield('keyword')" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />    	
    	<link rel="stylesheet" href="/static/css/header.css" />
    	@yield('css')		
	</head>
	<body>
		<div class="global-nav">
			<nav class="container">
				<div class="nav-left">
					<div class="header-logo">
						<h1>
							<a href="\">Biecheng</a>
						</h1>
					</div>
					<div class="menu hidden-menu">
						<ul class="menu-list hidden-menu-list">
							@foreach($nav as $n)
							<li class="menu-item">
								<a href="\{{ $n->cname }}">{{ $n->name }}</a>
							</li>
							@endforeach
						</ul>
						<form class="header-search" onsubmit="getsearch();">
							<input placeholder="搜索问题或关键字" type="text" id="keyword"/>
						</form>
					</div>
				</div>
				<div class="nav-right">
					<ul class="menu-list">
						<li class="menu-item dropdown-avatar">
							<a class="user-avatar" data-toggle="dropdown" href="#"></a>
							<div class="dropdown-avatar-menu">
								<a href="/">提问题</a>								
								<a href="/">个人中心</a>
								<a href="/">个人设置</a>
							</div>
						</li>
					</ul>
				</div>
			</nav>
		</div>
		@yield('main')
		<div class="container">
			<div class="footer">
				<span>关于我们|</span>
				<span>联系我们|</span>
				<span>广告服务</span>
			</div>
		</div>		
	</body>
	@yield('js')
	<script type="text/javascript" src="/static/js/jquery.min.js" ></script>	
	<script>
		function getsearch()
		{
				window.event.returnValue=false; 
				window.location.href = '/search?query=' + $('#keyword').val();
		}
	</script>	
</html>
