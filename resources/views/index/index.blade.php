@extends('index.master')

@section('title', 'Biecheng 别城')
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
		<div class="col-md-left">
		</div>
		<div class="col-md-middle">
			<div class="list-title">
				<h5>为你推荐</h1>
			</div>
			<div class="news-list">
				<ul class="item-ul">
					@foreach($data['question'] as $d)
					<li class="item-li">
						<div class="item-title">
							<a href="\q\{{ $d->id }}">{{ $d->title }}</a>
						</div>
						<div class="item-describes">
							<a href="\q\{{ $d->id }}">
								<span>{{ $d->describes }}</span>
							</a>
						</div>
						<div class="item-userbar">
							<span>
								<a class="fa fa-user-circle color-green"></a>
								<a href="/u/{{ $d->uid }}">{{ $d->user->nickname }}</a>
								<span class="time">{{ $d->created_at->diffForHumans() }}</span>
								<span class="view">{{ $d->pageviews }}次浏览</span>			
							</span>
						</div>
					</li>
					@endforeach
				</ul>
			</div>
		</div>
		<div class="col-md-right">
			<div class="col-md-right-s col-md-right-s-i">
				<div class="box-top clearfix ht-auto">
					<ul class="menu-list hidden-menu-list menu-list-i">
						<li class="menu-item fa fa-question-circle-o menu-item-i">
							<a href="/new/question">发问答</a>
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
		<div class="col-md-right" style="margin-top: 10px;">
			<div class="col-md-right-s col-md-right-s-i">
				<div class="header-mac">
					<span class="header-mac-dot-wrap">
						社区状况
					</span>					
				</div>
				<div class="mac-text mac-text-i">
					<span class="fa fa-user-circle">注册会员 <span id="usernum"></span></span>
				</div>
				<div class="mac-text mac-text-i">
					<span class="fa fa-question-circle">问答总数  <span id="questionnum"></span></span>
				</div>
				<div class="mac-text mac-text-i">
					<span class="fa fa-file-text-o">文章总数  <span id="articlenum"></span></span>
				</div>								
			</div>
		</div>		
	</div>
</div>
@endsection

@section('js')
<script type="text/javascript" src="/static/js/jquery.min.js" ></script>
<script type="text/javascript" src="/static/js/common.js" ></script>	
<script>
	window.onload = function () {
		getWebBasciInfo();
	};
</script>
@endsection

