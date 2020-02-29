@extends('layouts.app')

@section('content')
	@if(count($posts) > 0)

		@foreach($posts as $post)

			<ul class="list-group">
				<li class="list-group-item">
					<div class="row">
						<div class="col-sm-6 col-md-6 col-lg-6">
							<img src="{{asset('image/img/'.$post->image)}}" alt="image" height="100px" width="100px">
						</div>
						<div class="col-sm-6 col-md-6 col-lg-6">
							<h1><a href="{{url('/show/'.$post->id)}}" class="text-decoration-none">{{$post->title}}</a></h1>
							<small>Write on {{$post->created_at}} by {{$post->user->name}}</small>
						</div>
					</div>
				</li>
				<br>
			</ul>
		@endforeach

		<br>

		{{$posts->links()}}

	@else
	
	<p class="text-center p-4">No post available</p>

	@endif

@endsection