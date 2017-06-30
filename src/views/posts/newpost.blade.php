@extends('Blog::layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">New Post</div>
                    <div class="panel-body" align="center">
                        {{ method_field('PUT') }}
                        <form method="post" action="{{route('newpost')}}">
                            {{--<form method="post" action="/newpost">--}}
                            Название статьи:<br>
                            <input type="text" name="title"><br>
                            <input type="hidden" name="save" value="1"><br>
                            {{ csrf_field() }}
                            Текст статьи:<br>
                            <textarea name="body"></textarea><br><br>
                            <p><input type="submit"></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
