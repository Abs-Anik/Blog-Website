@extends('layouts.app')

@section('content')


	
	<div class="container">
		<form action="{{url('/update/'.$edit->id)}}" method="post">
			@csrf
		  <div class="form-group">
		    <label for="title">Title</label>
		    <input type="text" class="form-control" id="title" name="title" value="{{$edit->title}}">
		  </div>

		  <div class="form-group">
		    <label for="body">Comment</label>
		    <br>
		    <textarea name="body" id="summary-ckeditor" cols="133" rows="10">
		    	{{$edit->body}}
		    </textarea>
		  </div>

		  <button type="submit" class="btn btn-primary">Update</button>
		</form>
	</div>


@endsection