@extends('example')

@section('content')

    <h1>Edit: {!! $movie->name !!}</h1>
    <p><a href="{{URL::to('home', [$movie->id]) }}">Back to movie description</a></p>
    {!! Form::model($movie, ['method' => 'PATCH', 'action' => ['MoviesController@update', $movie->id]]) !!}

    <div class="form-group">
        @if($movie->filePath != 'No image')
        <span>Current image: </span>
        <a href="/images/{{ $movie->filePath }}">{{ $movie->filePath }}</a>
        <hr>
        <div class="upload_movie">
            <label for="upload_movie">Chose new image</label>
            {!! Form::file('image', null, array('class' => 'form-control' )) !!}
        </div>
        @else
        {!! Form::file('image') !!}
        @endif
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
        {!! Form::submit('Update movie', ['class' => 'btn btn-primary form-control']) !!}
    </div>

    @if($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif



@endsection