@extends('question.master')

@section('title', $data['column']->name . ' - Biecheng 别城')
@section('description', 'description')
@section('keyword', $data['column']->name)

@section('css')
<link rel="stylesheet" type="text/css" href="/static/css/googleapis.css">
<link rel="stylesheet" type="text/css" href="/static/css/common.css">
<link rel="stylesheet" type="text/css" href="/static/css/index.css">
<link rel="stylesheet" type="text/css" href="/static/css/question.css">	
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

	<!--<div class="content">
		<div class="span8 left">
			<div class="container">
			  <div class="card">
			    <div class="card-header">
			    	{{ $data['column']->name }}
			    </div>
			    <div class="card-body">
					<ul>
						@foreach($data['question'] as $question)
						<li>
							<div class="title">
								<h2>
									<a href="/q/{{ $question->id }}">{{ $question->title }}</a>
								</h2>
							</div>
							<div class="summary">{{ $question->describes }}</div>
							<div class="list_userbar">{{ $question->created_at }}</div>
						</li>
						@endforeach					
					</ul>			    	
			    </div> 
			    <div class="card-footer">
				    <ul class="pagination">
					    @if( $data['question']->currentPage() <= 1 )
					    <li class="page-item"><a class="page-link" href="{{ $data['question']->nextPageUrl() }}">下一页</a></li>
					    @elseif( $data['question']->currentPage() != $data['question']->lastPage() )
					    <li class="page-item"><a class="page-link" href="question">首页</a></li>
					    <li class="page-item"><a class="page-link" href="{{ $data['question']->previousPageUrl() }}">上一页</a></li>	
				    	<li class="page-item"><a class="page-link" href="{{ $data['question']->nextPageUrl() }}">下一页</a></li>					    				    
				    	@else
				    	<li class="page-item"><a class="page-link" href="question">首页</a></li>
				    	<li class="page-item"><a class="page-link" href="{{ $data['question']->previousPageUrl() }}">上一页</a></li>					    
				    	@endif
				    </ul>			    	
			    </div>
			  </div>
			</div>			
		</div>
		<div class="span4 right">
			<div class="page-header">
				<h1>
					
				</h1>
			</div>
		</div>
	</div>-->
@endsection

@section('js')
@endsection
