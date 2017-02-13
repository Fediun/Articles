@extends('layouts.app')



@section('content')


    <article class="container">
        <h1>Tags:</h1>
        <ul>
        @foreach($tags as $tag)

            @unless($tag->articles->isEmpty())

           <li> <h3><a href="{{url('/tag', $tag->name)}}">{{$tag->name}}</a></h3> </li>

            @endunless

        @endforeach
        </ul>

    </article>
@stop

