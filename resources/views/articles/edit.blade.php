 @extends('layouts.app')

 @section('content')

     <h1>{!! $article->title !!}</h1>


     {!! Form::model($article, ['method' => 'PATCH', 'action' => ['ArticlesController@update', $article->id]]) !!}

    @include('articles.form', ['submitButtonText' => 'Update'])

     {!! Form::close() !!}

     {!! Form::open(['url' => route('articles.destroy', $article->id), 'method' => 'delete', 'class' => 'pull-right']) !!}
     <button type="submit" class="btn btn-danger">Delete</button>
     {!! Form::close() !!}



     @include('errors.list')

 @stop