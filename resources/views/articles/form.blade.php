
{!! Form::hidden('user_id') !!}

<div class="form-group">

    {!! Form::label('title', 'Title:') !!}

    {!! Form::text('title', null, ['class' => 'form-control']) !!}

</div>

<div class="form-group">

    {!! Form::label('body', 'Body:') !!}

    {!! Form::textarea('body', null, ['class' => 'form-control']) !!}

</div>

<div class="form-group" style="display: none">

    {!! Form::label('published_at', 'Publish On:') !!}

    {!! Form::input('date', 'published_at', date('Y-m-d'), ['class' => 'form-control']) !!}

</div>

<div class="form-group">

    {!! Form::label('tag_list', 'Tags:') !!}
    {!! Form::select('tag_list[]' , $tags, null,['id' => 'tag_list','class' => 'form-control', 'multiple']) !!}

</div>

<div class="form-group">

    {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control',]) !!}

</div>

@section('footer')

    <script type="text/javascript">
        $('select').select2();
    </script>

@endsection

