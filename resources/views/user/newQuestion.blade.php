@extends('user.master')

@section('title', '创建新问答  - Biecheng 别城')
@section('description', 'Biecheng开发者社区')
@section('keyword', '编程交流、IT技术、技术问答、技术博客、开源、代码')

@section('css')
<link rel="stylesheet" type="text/css" href="/static/css/googleapis.css">
<link rel="stylesheet" type="text/css" href="/static/css/common.css">		
<link rel="stylesheet" type="text/css" href="/static/css/index.css">	
<link rel="stylesheet" href="/static/css/editormd.css" />	
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
		<div class="col-md-middle col-md-middle-u col-md-middle-q">
			<div class="header-mac">
				<span class="header-mac-dot-wrap">
					<span class="header-mac-dot header-mac-dot-red"></span>
					<span class="header-mac-dot header-mac-dot-yellow"></span>
					<span class="header-mac-dot header-mac-dot-green"></span>
				</span>
				<div class="header-mac-title fa fa-pencil header-mac-title-q">
					发布问题
				</div>
			</div>
			<div class="message">
				<span class="fa fa-bell-o">设置已成功保存</span>
			</div>
			<div class="body-mac body-mac-u">
				<form action="#" method="POST" onsubmit="return false;">
					{{ csrf_field() }}	
					<div class="mac-text" style="height: 10px !important;"></div>
					<div class="mac-input-wrap mac-input-wrap-q">
						<input type="" name="title" id="title" value="" class="mac-input" placeholder="标题"/>
					</div>
					<div class="editormd-wrap editormd-border">
						<div id="editormd" class="editormd-wrap-box">
						    <textarea style="display:none;" id="editormd1">### 请使用 Markdown 编写</textarea>
						</div>				
					</div>	
					<div style="margin: 10px 0 3px 0;">
						<span class="editormd-span">
							请选择标签
							<input value="" class="mac-input editormd-q-tag-input" placeholder="标签，如：php,java（用逗号,分隔）"/>
						</span>							
					</div>					
					<div class="clearfix ht-auto editormd-q-tag">
						<div class="col-md-middle htag col-md-middle-q">
							<ul class="tag-ul">
								@foreach($nav_erji as $n)
								<li class="tag-li">
									<a href="javascript: void(0);" class="tag-li-a" data-i="{{ $n->id }}" data-c="{{ $n->name }}">{{ $n->name }}</a>
								</li>
								@endforeach							
							</ul>
						</div>						
					</div>
					<div class="mac-input-wrap editormd-border mac-input-wrap-q" style="border: 2px solid #d6d6d6; border-radius: 15px;">
						<button class="mac-button" style="border-radius: 15px;" onclick="postQuestion()">发布问答</button>
					</div>																		
				</form>
			</div>
		</div>
	</div>
</div>
@endsection

@section('js')
<script type="text/javascript" src="/static/js/jquery.min.js" ></script>
<script type="text/javascript" src="/static/js/jquery.cookie.js" ></script>	
<script type="text/javascript" src="/static/js/editormd.min.js" ></script>	
<script src="/static/js/showdown.min.js"></script>
<script>
	//标签选择
	$('.editormd-q-tag-input').click(function() {
		$('.editormd-q-tag').show();
		return false;
	});
	$('body').click(function () {
		$('.editormd-q-tag').hide();
	});
	$('.editormd-q-tag').click(function (e) {
		return false;
	});	
	
	$('.tag-li-a').click(function () {
		var tag = $(this).text();
		var tagArr = $('.editormd-q-tag-input').val();
		if(tagArr)
		{
			$('.editormd-q-tag-input').val(tagArr + ',' + tag);
		}else{
			$('.editormd-q-tag-input').val(tag);
		}
	});
	
	window.onload = function() {
		getUserInfo();
        var editor = editormd("editormd", {
        	width: "100%",
        	height: 350,
            path : "/static/editor.md/lib/", // Autoload modules mode, codemirror, marked... dependents libs path
       		toolbarIcons : function() {
       			return editormd.toolbarModes['mini'];
       		},
            editorTheme: "base16-light",
            previewTheme: "base16-light",  
            watch: false,  	
        });		
	}
	function getUserInfo()
	{
		var token = $.cookie('biecheng_token');
		$.ajax({
			type: "GET",
			url: "/api/userInfo",
			async: true,
			dataType: 'json',
			headers:{
			   "Authorization": "Bearer " + token,
			},
			success: function(res){
				var data = res.success;
				//账号未激活
				var status = res.success.status;
				if( status == 0)
				{
					window.location.href = '/emailActivation';
				};					
			},
			error: function(res){
				window.location.href = '/login';
			},
		});		
	}
	
	function postQuestion()
	{	
		if(!$('#title').val())
		{
			$('.fa-bell-o').text('请输入标题！');
			$('.message').show();			
			return ;
		}
		if(!$('#editormd1').val())
		{
			$('.fa-bell-o').text('请输入内容！');
			$('.message').show();			
			return ;			
		}		
		if(!$('.editormd-q-tag-input').val())
		{
			$('.fa-bell-o').text('请选择标签！');
			$('.message').show();			
			return ;			
		}
		var token = $.cookie('biecheng_token');		
		var content = $('#editormd1').val();
	    var converter = new showdown.Converter(); //初始化转换器
	    var htmlcontent  = converter.makeHtml(content); //将MarkDown转为html格式的内容
	    var describes = htmlcontent.replace(/<\/?[^>]*>/g, ''); //去除HTML tag
	    describes = describes.slice(0, 160);
	    //获取分类ID
	    var type = $('.editormd-q-tag-input').val();
	    var typeArr = type.split(',');
	    var typeId = $('.tag-li-a[data-c="' + typeArr[0] + '"]').attr('data-i');
	    
		var data = {
			'title': $('#title').val(),
			'keyword': $('.editormd-q-tag-input').val(),
			'content': htmlcontent,
			'cnid': typeId,
			'describes': describes,
		};
		$.ajax({
			type: "POST",
			url: "/api/new/question",
			async: true,
			data: data,
			dataType: 'json',
			headers:{
			   "Authorization": "Bearer " + token,
			},
			success: function(res){
				if( res.success )
				{
					window.location.href = '/q/' + res.success;
				}
			},
			error: function(res){
				window.location.href = '/login';
			},
		});				
	}
</script>
@endsection

