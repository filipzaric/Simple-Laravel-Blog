@extends('example')

@section('content')

    <h1>Create movie</h1>

    <a href="{{URL::to('home') }}">Back</a>

    {!! Form::open(['url' => 'home', 'files' => true]) !!}

    <div class="form-group">
        {!! Form::label('image', 'Choose an image') !!}
        {!! Form::file('image') !!}
    </div>

    <div class="form-group">
        {!! Form::label('name', 'Title: ') !!}
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('year', 'Release Date: ') !!}
        {!! Form::text('year', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('description', 'Description: ') !!}
        {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('Create Movie', ['class' => 'btn btn-primary form-control']) !!}
    </div>


    {!! Form::close() !!}

    @if($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

@stop