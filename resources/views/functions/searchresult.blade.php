@extends('functions.master_nav_footer')

@section('title', $data['query'] . '的搜索结果 - Biecheng 别城')
@section('description', $data['query'] . '的搜索结果')
@section('keyword', $data['query'])

@section('css')
@endsection

@section('main')
<div class="wrapper" style="margin-top: 10px;">
	<div class="container clearfix ht-auto">
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
			<div class="pagination">
				<ul class="pagination-ul card-ul">
<!--					<li class="card-li padding-li" id="paginationli">1</li>-->
				</ul>
			</div>			
		</div>
	</div>
</div>
@endsection

@section('js')
<script type="text/javascript" src="/static/js/common.js" ></script>	
<script>
	var paginationNum = {{ $data['results']->lastPage() }};
	//获取当前页
	var pageStr = window.location.search;
	var pageArr = pageStr.split('=');
	
	var page = pageArr[2];
	var keyword = pageArr[1].split('&')[0]
	page = parseInt(page);
	
	if($('.pagination').width() <= 600)
	{
		pagination(paginationNum, page, 1);
	
		//评论 pagination
		$('.pagination-ul').on('click', '.padding-li', function() {		
			var page = $(this).text();
			page = parseInt(page);
			window.location.href = '/search?query=' + keyword + '&page=' + page
			pagination(paginationNum, page, 1);		
		});		
	}else{
		pagination(paginationNum, page);
	
		//评论 pagination
		$('.pagination-ul').on('click', '.padding-li', function() {		
			var page = $(this).text();
			page = parseInt(page);
			window.location.href = '/search?query=' + keyword + '&page=' + page
			pagination(paginationNum, page);		
		});		
	}	
	
</script>
@endsection
