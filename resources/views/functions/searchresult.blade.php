@extends('functions.master_nav_footer')

@section('title', $data['query'] . '的搜索结果 - Biecheng 别城')
@section('description', $data['query'] . '的搜索结果')
@section('keyword', $data['query'])

@section('css')
@endsection

@section('main')
<div class="wrapper" style="margin-top: 10px;">
	<div class="container" style="height: auto;">
		<div class="col-md-left">
		</div>
		<div class="col-md-middle">
			<div class="list-title">
				<h5>搜索结果</h1>
			</div>
			<div class="news-list">
				<ul class="item-ul">
					@foreach($data['results'] as $d)
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
			<div class="page-list">
			    <ul class="pagination">
				    @if( $data['results']->currentPage() <= 1 )
				    <li class="page-item"><a class="page-link" href="{{ $data['results']->nextPageUrl() }}">下一页</a></li>
				    @elseif( $data['results']->currentPage() != $data['results']->lastPage() )
				    <li class="page-item"><a class="page-link" href="results">首页</a></li>
				    <li class="page-item"><a class="page-link" href="{{ $data['results']->previousPageUrl() }}">上一页</a></li>	
			    	<li class="page-item"><a class="page-link" href="{{ $data['results']->nextPageUrl() }}">下一页</a></li>					    				    
			    	@else
			    	<li class="page-item"><a class="page-link" href="results">首页</a></li>
			    	<li class="page-item"><a class="page-link" href="{{ $data['results']->previousPageUrl() }}">上一页</a></li>					    
			    	@endif
			    </ul>					
			</div>			
		</div>
	</div>
</div>
@endsection

@section('js')
@endsection
