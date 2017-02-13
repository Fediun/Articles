 @extends('layouts.app')

      @section('content')
        <h1>Create a new Article</h1>

 {!! Form::open(['url' => 'articles']) !!}

      @include('articles.form', ['submitButtonText' => 'Add'])

 {!! Form::close() !!}


      @include('errors.list')

        @stop