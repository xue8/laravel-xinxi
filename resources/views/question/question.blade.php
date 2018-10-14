@extends('question.master')

@section('title', $data['question']->title . ' - Biecheng 别城')
@section('description', $data['question']->describes)
@section('keyword', $data['question']->keyword)

@section('css')
<link rel="stylesheet" type="text/css" href="/static/css/googleapis.css">
<link rel="stylesheet" type="text/css" href="/static/css/common.css">
<link rel="stylesheet" type="text/css" href="/static/css/index.css">
<link rel="stylesheet" type="text/css" href="/static/css/question.css">		
@endsection

@section('main')
<div class="wrapper details">
	<div class="container" style="height: auto;">
		<div class="col-md-middle">
			<div class="breadcrumb">
				<a href="/">首页></a>
				<a href="/question/{{ $data['column']->cname }}">{{ $data['column']->name }}</a>
			</div>
			<h2>{{ $data['question']->title }}</h2>
			<div class="item-userbar">
				@foreach($data['keywordArr'] as $arr)
				<a href="/search?tag={{ $arr }}" class="tag">{{ $arr }}</a>
				@endforeach
				<span>
					<a>学而时习之·</a>
					<span class="time">{{ $data['question']->created_at->diffForHumans() }}</span>
					<span class="view">{{ $data['question']->pageviews }}次浏览</span>
				</span>				
			</div>
			<div class="content">
				<p>{!! $data['content']->content !!}</p>
			</div>
		</div>
		<div class="col-md-right">
			<div class="col-md-right-s">
				<div class="card-header">
					<div class="card-header-text">相似问题</div>
				</div>
				<div class="card-content">
					<ul class="card-ul">
			    		@foreach($data['similarQuestionArr'] as $s)
			    		<li class="card-li"><a href="/q/{{ $s['id'] }}">{{ $s['title'] }}</a></li>
			    		@endforeach						
					</ul>
				</div>				
			</div>
		</div>
	</div>
</div>
@endsection

@section('js')
@endsection
