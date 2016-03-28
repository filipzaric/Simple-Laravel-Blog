@extends('app')

@include('includes/header')

@section('content')



<div class="Body-content">

	<div class="container-small">
		@if (session('message'))
			<div class="alert alert-success">
			{{ session('message') }}
			</div>
		@endif
	</div>

    <p>{!! Html::linkRoute('home.create', 'Create movie') !!}</p>
            @foreach($movies as $movie)
	            <p>
	                <h1><a href="{{ url('home', $movie->id) }}">{{ $movie->name }}</a>
	                </h1>
	                <h2>({{$movie->year}})</h2>
	            </p>
	                    
	             <p>{{ substr($movie->description, 0, 150) }}...</p>
            @endforeach
</div>

@endsection