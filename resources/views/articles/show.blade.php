@extends('layouts.app')

@section('content')

    <a href="{{ url('/articles/'.$article->id.'/edit') }}"><div class="btn btn-default"> Edit Article</div></a>
    <article>
    <h1>{{$article->title}}</h1>

    <div class="body">
        {{$article->body}}
        <br>
        @unless($article->tags->isEmpty())
        <h3>Tags:</h3>
        <ul>
            @foreach($article->tags as $tag)
                <li><a href="{{url('/tag', $tag->name)}}">{{$tag->name}}</a></li>
            @endforeach
        </ul>
        @endunless
    </div>

    </article>
@stop
