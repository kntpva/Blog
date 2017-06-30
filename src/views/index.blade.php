@extends('Blog::layouts.app')

@section('content')
    <div class="row text-center hidden-sm"><a href="{{ URL::route('newpost') }}">Написать статью</a></div>
    @if($posts->count())
        <div class="row">
            @foreach($posts as $post)
                <div class="col-sm-4 com-lg-3">
                    <article>
                        <h2>{{$post->title}}</h2>
                        <p>{{ str_limit($post->body, 120)}}</p>
                        <a href="{{ URL::route('get-post', $post->id) }}">Читать далее...</a>
                        <hr>
                    </article>
                </div>
            @endforeach
        </div>
    @endif
@endsection


