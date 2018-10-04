@extends('question.master')

@section('title', 'title')
@section('description', 'description')
@section('keyword', 'keyword')

@section('css')
<link rel="stylesheet" href="/static/css/bootstrap.min.css" />
<style>
	.main{
		width: 60%;
		height: 600px;
		margin: auto;
	}
	.clist{
		width: 33.33%;
		height: 40px;
		float: left;
		text-align: center;
		margin-left: auto;
	}
	.cbtn{
		width: 95%;
		height: 100%;
		margin: auto;
	}
</style>
@endsection

@section('main')
<div class="main">
	@foreach($nav as $column)
		<div class="clist">
			<button id="fat-btn" class="btn btn-primary cbtn" type="button">{{ $column->name }}</button>
		</div>
	@endforeach
</div>
@endsection