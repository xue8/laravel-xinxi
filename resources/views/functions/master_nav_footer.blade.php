<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>@yield('title')</title>
		<meta name="description" content="@yield('description')" />
    	<meta name="keywords" content="@yield('keyword')" />
    	<link rel="stylesheet" href="/static/css/bootstrap.min.css" />
		<style>
			body{ 
				margin:0; 
				height:2520px;
			}
			.box{
				height: 100%;
			}
			.hnav{
				width: 80%;
				height: 68.8px;
				margin: auto;
				background: #fafafa;
			}
			.navtext{
				font-size: 25px;
			}
			.navform{
				margin-left: 30px;
			}
			/*.nav1{
				border-bottom:1px solid #eee;
				padding-top: 5px;
				padding-bottom: 5px;
				line-height: 30px;
			}
			.nav1 span{
				height: 30px;
				line-height: 30px;
				margin-right: 20px;
			}
			.nav1 span a{
				text-decoration: none;
				color: #9e9e9e;
			}*/
			.footer{
	            left:0px;
	            right: 0px;
	            bottom: 0px;
	            margin:auto;
				background: #fafafa;
				border: 1px solid #f3f3f3;
			}
			.footer p{
				text-align: center;
				line-height: 15px;
				font-size: 12px;
			}
		</style>   	
    	@yield('css')		
	</head>
	<body>
		<div class="box">
			<div class="hnav">	
				<nav class="navbar navbar-expand-sm bg-light navbar-light">
				  <!-- Brand/logo -->
				  <a class="navbar-brand" href="/">Biecheng</a>
				  <ul class="navbar-nav">
				  	@foreach($nav as $column)
				    <li class="nav-item">
				      <a class="nav-link navtext" href="/{{ $column->cname }}">{{ $column->name }}</a>
				    </li>
				    @endforeach
				  </ul>
				  <form class="form-inline navform">
				    <input class="form-control" type="text" placeholder="search" id="keyword">
				    <button class="btn btn-success" type="button" onclick="getsearch()">搜索</button>
				  </form>  
				</nav>
				<!--<div class="nav1">
					@foreach($nav_erji as $column)
					<span>
						<a href="/question/{{ $column->cname }}">{{ $column->name }}</a>
					</span>
					@endforeach
				</div>-->
			</div>
			@yield('main')
			<div class="footer">
				<p>
					<a>网站首页</a>
					<em>|</em>
					<a>关于我们</a>
					<em>|</em>
					<a>网站公告</a>
					<em>|</em>
					<a>联系我们</a>
					<em>|</em>
					<a>广告服务</a>
				</p>
			</div>
		</div>		
	</body>	
	<script type="text/javascript" src="/static/js/jquery.min.js" ></script>
	<script type="text/javascript" src="/static/js/bootstrap.min.js" ></script>		
	@yield('js')
	<script>
		function getsearch()
		{
				window.location.href = '/search?query=' + $('#keyword').val();
		}
	</script>	
</html>
