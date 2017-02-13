@extends('layouts.app')

@section('content')
    <a href="{{ url('/articles/create') }}"><div class="btn btn-default"> Create your own Article</div></a>
    <h1>Articles</h1>

    <article>
        @foreach($articles as $article)

            <h2><a href="{{url('/articles', $article->id)}}">{{$article->title}}</a></h2>
            <div class="body">
                {{$article->body}}
            </div>


        @endforeach

        <div class="paginations col-lg-12">
            {!! $articles->render() !!}
        </div>

    </article>
@stop
