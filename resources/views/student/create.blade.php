@extends('common.layouts')

@section('content')
    @include('common.validator')
    <div class="panel panel-default">
        <div class="panel-heading">新增学生</div>
        <div class="panel-body">
            {{--
            <form class="form-horizontal" method="post" action=" {{ url('student/save') }}">
            这种方式可以通过save方法增加
            <form class="form-horizontal" method="post" action=" ">
            直接调用当前方法
            --}}
            @include('student.form')
        </div>
    </div>

@stop
