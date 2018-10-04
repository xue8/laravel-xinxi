@extends('index.master')

@section('title', 'Biecheng 别城')
@section('description', 'Biecheng开发者社区')
@section('keyword', '编程交流、IT技术、技术问答、技术博客、开源、代码')

@section('css')
<link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
<style>
    html, body {
        background-color: #fff;
        color: #636b6f;
        font-family: 'Raleway', sans-serif;
        font-weight: 100;
        height: 100vh;
        margin: 0;
    }

    .full-height {
        height: 100vh;
    }

    .flex-center {
        align-items: center;
        display: flex;
        justify-content: center;
    }

    .position-ref {
        position: relative;
    }

    .top-right {
        position: absolute;
        right: 10px;
        top: 18px;
    }

    .content {
        text-align: center;
    }

    .title {
        font-size: 84px;
    }

    .links > a {
        color: #636b6f;
        padding: 0 25px;
        font-size: 12px;
        font-weight: 600;
        letter-spacing: .1rem;
        text-decoration: none;
        text-transform: uppercase;
    }

    .m-b-md {
        margin-bottom: 30px;
    }
</style>
@endsection

@section('main')
    <div class="flex-center position-ref full-height">
        <!--@if (Route::has('login'))
            <div class="top-right links">
                @auth
                    <a href="{{ url('/home') }}">Home</a>
                @else
                    <a href="{{ route('login') }}">Login</a>
                    <a href="{{ route('register') }}">Register</a>
                @endauth
            </div>
        @endif-->

        <div class="content">
            <div class="title m-b-md">
                Biecheng
            </div>

            <div class="links">
                <a href="\question">问答</a>
                <a href="\zhuanlan">专栏</a>
                <a href="\question\php">PHP</a>
                <a href="\question\python">Python</a>
                <a href="\question\java">java</a>
            </div>
        </div>
    </div>
@endsection

@section('js')
@endsection

