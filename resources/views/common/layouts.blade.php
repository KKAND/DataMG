<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BlueBuck  @yield('title')</title>
    <!-- Bootstrap CSS 文件 -->
    {{--<link rel="stylesheet" href="{{ asset('static/bootstrap/css/bootstrap.min.css') }}">--}}
    <!-- 最新版本的 Bootstrap 核心 CSS 文件 -->
    <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    @section('style')

    @show
</head>
<body>

<!-- 头部 -->
@section('header')

<div class="jumbotron">
    <div class="container">
        <h2>BlueBuck</h2>
        <p> - 信息管理系统</p>
    </div>
</div>
@show
<!-- 中间内容区局 -->
<div class="container">
    <div class="row">

        <!-- 左侧菜单区域   -->
        <div class="col-md-3">
            @section('leftmenu')
            <div class="list-group">
                <a href="{{url('student/index') }}" class="list-group-item
                {{ Request::getPathInfo() =='/student/index' ? 'active' : ''}}
                        ">成员列表</a>
                <a href="{{ url('student/create') }}" class="list-group-item
                {{ Request::getPathInfo()=='/student/create' ? 'active' : ''}}
                        ">新增成员</a>
            </div>
                @show
        </div>

        <!-- 右侧内容区域 -->
        <div class="col-md-9">
            @yield('content')
        </div>
    </div>
</div>



<!-- 尾部 -->
@section('footer')
<div class="jumbotron" style="margin:0;">
    <div class="container">
        <span>  @2016 eie</span>
    </div>
</div>
@show
<!--导入在线样式文件-->
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
<script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<!-- jQuery 文件 -->
<script src="{{ asset('static/jquery-3.2.1.min.js') }}"></script>
<!-- Bootstrap JavaScript 文件 -->
<script src="{{ asset('static/bootstrap/js/bootstrap.min.js') }}"></script>

   @section('javascript')

    @show
</body>
</html>