@extends('app')

@include('includes/header')

@section('content')

<div class="Body-content">

	<a href="{{URL::to('home') }}">Back</a>
	<h1>{{ $movie->name }}</h1>


	<a href="{{ action('MoviesController@edit', [$movie->id]) }}">Edit</a>
	
	@if($movie->filePath != 'No image')
	<p><img src="/images/{{$movie->filePath}}" width="500px" height="500px"></p>
	@endif
	</hr>
	<p>Year: {{ $movie->year }}</p>
	<p>{{$movie->description}}</p>
</div>

@stop