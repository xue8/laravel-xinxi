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
        font-weight: 100;
        height: 100vh;
        margin: 0;
    }
</style>
@endsection

@section('main')
<div class="wrapper" style="margin-top: 10px;">
	<div class="container" style="height: auto;">
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
								<a>学而时习之·</a>
								<span class="time">{{ $d->created_at->diffForHumans() }}</span>
								<span class="view">{{ $d->pageviews }}次浏览</span>
							</span>
						</div>
					</li>
					@endforeach
				</ul>
			</div>
		</div>
	</div>
</div>
@endsection

@section('js')
@endsection

