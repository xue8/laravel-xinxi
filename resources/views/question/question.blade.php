@extends('question.master')

@section('title', $data['question']->title . ' - Biecheng 别城')
@section('description', $data['question']->describes)
@section('keyword', $data['question']->keyword)

@section('css')
<link rel="stylesheet" type="text/css" href="/static/css/googleapis.css">
<link rel="stylesheet" type="text/css" href="/static/css/common.css">
<link rel="stylesheet" type="text/css" href="/static/css/index.css">
<link rel="stylesheet" type="text/css" href="/static/css/question.css">	
<link rel="stylesheet" href="/static/css/editormd.css" />
<link rel="stylesheet" href="/static/css/user.css" />			
@endsection

@section('main')
<div class="wrapper details">
	<div class="container clearfix ht-auto">
		<div class="col-md-middle">
			<div class="breadcrumb">
				<a href="/">首页</a> >
				<a href="/question/{{ $data['question']->column->cname }}">{{ $data['question']->column->name }}</a>
			</div>
			<h2>{{ $data['question']->title }}</h2>
			<div class="item-userbar item-userbar-q bor-bot">
				@foreach($data['keywordArr'] as $arr)
				<a href="/search?tag={{ $arr }}" class="tag">{{ $arr }}</a>
				@endforeach
				<span>
					<a href="/u/{{ $data['question']->uid }}">{{ $data['question']->user->nickname }}</a>
					<span class="time">{{ $data['question']->created_at->diffForHumans() }}</span>
					<span class="view">{{ $data['question']->pageviews }}次浏览</span>
				</span>				
			</div>
			<div class="content item-userbar-q">
				<p>{!! $data['question']->content->content !!}</p>
			</div>
		</div>
		<div class="col-md-right clearfix">
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
		<div class="comment-wrap col-md-middle clearfix ht-auto" id="comment-wrap">
			<div class="header-mac">
				<div class="header-mac-title-left commemt-replay fa fa-reply-all">
					<!--2条回复-->
				</div>		
			</div>
			<div class="body-mac body-mac-comment" style="background-color: #fff !important;">
			</div>	
			<div class="pagination">
				<ul class="pagination-ul card-ul">
					<!--<li></li>-->
				</ul>
			</div>			
		</div>
		<div class="comment-wrap col-md-middle clearfix ht-auto">
			<div class="header-mac">
				<div class="header-mac-title-left fa fa-reply-all">
					撰写答案
				</div>		
			</div>
			<form>
				<div class="editormd-wrap editormd-border" style="width: 95% !important; height: auto;">
					<div id="editormd" class="editormd-wrap-box">
					    <textarea style="display:none;" id="editormd1"></textarea>
					</div>				
				</div>	
				<div class="mac-input-wrap editormd-border mac-input-wrap-q" style="border: 1px solid #d6d6d6; border-radius: 15px; margin-bottom: 20px;">
					<button class="mac-button" style="border-radius: 15px;" onclick="postComment()">回复</button>
				</div>								
			</form>
		</div>		
	</div>
</div>
@endsection

@section('js')
<script type="text/javascript" src="/static/js/jquery.min.js" ></script>
<script type="text/javascript" src="/static/js/common.js" ></script>
<script type="text/javascript" src="/static/js/jquery.cookie.js" ></script>	
<script type="text/javascript" src="/static/js/editormd.min.js" ></script>	
<script src="/static/js/showdown.min.js"></script>	
<script>
	var token = $.cookie('biecheng_token');	
	//文章、问答ID
	var qid = {{ $data['question']->id }};
	//栏目id
	var cnid = {{ $data['question']->cnid }};
	
	getComment(qid, cnid, '10', '1');
	//评论 pagination
	$('.pagination-ul').on('click', '.padding-li', function() {
		$('.body-mac-comment').empty();	
 		$('.pagination-ul').empty();		
		var page = $(this).text();
		getComment(qid, '10', page);		
	});	
	
    var editor = editormd("editormd", {
    	width: "100%",
    	height: 200,
        path : "/static/editor.md/lib/", // Autoload modules mode, codemirror, marked... dependents libs path
   		toolbar: false,
   		toolbarIcons : function() {
   			return editormd.toolbarModes['mini'];
   		},
		theme: (localStorage.theme) ? localStorage.theme : "default",
		mode: (localStorage.mode) ? localStorage.mode : "text/html",
        watch: false,  	
    });	
    
    function postComment()
    {
    	var content = $('#editormd1').val();
 	    var converter = new showdown.Converter(); //初始化转换器
	    var htmlcontent  = converter.makeHtml(content); //将MarkDown转为html格式的内容   	
    	var data = {
    		'qid': qid,
    		'content': htmlcontent,
     		'cnid': cnid,   		
    	}
		$.ajax({
			type: "POST",
			url: "/api/comment",
			async: true,
			data: data,
			dataType: 'json',
			headers:{
			   "Authorization": "Bearer " + token,
			},
			success: function(res){
//				console.log(res);
			},
			error: function(res){
				window.location.href = '/login';
			},
		});	    	
    }
</script>
@endsection
