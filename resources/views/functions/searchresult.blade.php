@extends('functions.master_nav_footer')

@section('title', $data['query'] . '的搜索结果 - Biecheng 别城')
@section('description', $data['query'] . '的搜索结果')
@section('keyword', $data['query'])

@section('css')
<style>
	.card-body ul li{
		border-bottom: 1px solid #f4f4f4;
		list-style: none;
	}
	h2{
		font-size: 18px;
		font-weight: bold;
		line-height: 24px;
		white-space: nowrap;
		text-overflow:ellipsis;
		overflow:hidden;
	}
	.content{
		height: 100%;
		width: 80%;
		margin: auto;
	}
	.left{
		margin-top: 20px;
		width: 70%;
		float: left;
	}
	.right{
		margin-top: 20px;	
		width: 27%;
		float: left;
		margin-left: 3%;
	}
	.card-body{
		padding: 0px;
	}
	.title{
		margin-top: 10px;
	}
	.summary{
		font-size: 15px;
		color: #8a8a8a;
	    overflow: hidden;
	    text-overflow: ellipsis;
	    display: -webkit-box;
	    -webkit-line-clamp: 2;
	    -webkit-box-orient: vertical;	
	}
	.list_userbar{
		font-size: 13px;
		color: #999;
	}
	a{
		text-decoration:none;
		color:black;
	}
	a:hover{
		text-decoration:none;	
	}
</style>
@endsection

@section('main')
	<div class="content">
		<div class="span8 left">
			<div class="container">
			  <div class="card">
			    <div class="card-header">
					搜索结果
			    </div>
			    <div class="card-body">
					<ul>
						@foreach($data['results'] as $res)
						<li>
							<div class="title">
								<h2>
									<a href="/q/{{ $res->id }}">{{ $res->title }}</a>
								</h2>
							</div>
							<div class="summary">{{ $res->describes }}</div>
							<div class="list_userbar">{{ $res->created_at }}</div>
						</li>
						@endforeach					
					</ul>			    	
			    </div> 
			    <div class="card-footer">
				    <ul class="pagination">
					    @if( $data['results']->currentPage() <= 1 )
					    <li class="page-item"><a class="page-link" href="{{ $data['results']->appends([$data['type']=>$data['query']])->nextPageUrl() }}">下一页</a></li>
					    @elseif( $data['results']->currentPage() != $data['results']->lastPage() )
					    <li class="page-item"><a class="page-link" href="question">首页</a></li>
					    <li class="page-item"><a class="page-link" href="{{ $data['results']->appends([$data['type']=>$data['query']])->previousPageUrl() }}">上一页</a></li>	
				    	<li class="page-item"><a class="page-link" href="{{ $data['results']->appends([$data['type']=>$data['query']])->nextPageUrl() }}">下一页</a></li>					    				    
				    	@else
				    	<li class="page-item"><a class="page-link" href="question">首页</a></li>
				    	<li class="page-item"><a class="page-link" href="{{ $data['results']->appends([$data['type']=>$data['query']])->previousPageUrl() }}">上一页</a></li>					    
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
	</div>
@endsection

@section('js')
@endsection
