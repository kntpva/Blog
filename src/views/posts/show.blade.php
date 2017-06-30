@extends('Blog::layouts.app')
@section('content')

<div class="row">
    <article>
        <form method="post" action="{{ URL::route('deletepost', $post->id) }}">
            <h1>{{ $post->title }}</h1>
            <p> Опубликовано {{ $post->created_at}} </p>
            <p> Обновление {{ $post->updated_at}} </p>
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
            <p>{{ $post->body }}</p>
            <p><input class="btn btn-danger" value="Удалить статью" type="submit" ></p>
        </form>
    </article>
</div>
@endsection
