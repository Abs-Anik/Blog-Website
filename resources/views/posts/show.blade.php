@extends('layouts.app')

@section('content')

	
	
	<div class="container">
		<img src="{{asset('image/img/'.$show->image)}}" alt="image" width="200px" height="150px">
		<br>
		<h1>{{$show->title}}</h1>
		<p>{!!$show->body!!}</p>
		<hr>
		<small>{{$show->created_at}} by {{$show->user->name}}</small>
		<br>
		<br>
		<a href="{{url('/posts')}}" class="btn btn-primary">Back</a>
		<!-- check user or guest -->
		@if(!Auth::guest())

		@if(Auth::user()->id == $show->user_id)

		
		<a href="{{url('/edit/'.$show->id)}}" class="btn btn-success">Edit</a>

		<a href="{{url('/destroy/'.$show->id)}}" class="btn btn-danger">Delete</a>

		@endif

		@endif
	</div>


@endsection