@extends('layouts.app')

@section('content')


	
	<div class="container">
		<form action="{{url('/store')}}" method="post" enctype="multipart/form-data">
			@csrf
		  <div class="form-group">
		    <label for="title">Title</label>
		    <input type="text" class="form-control" id="title" name="title">
		  </div>

		  <div class="form-group">
		    <label for="body">Comment</label>
		    <br>
		    <textarea name="body" id="summary-ckeditor" cols="133" rows="10"></textarea>
		  </div>

		  <div class="form-group">
		    <label for="image">Choose image</label>
		    <input type="file" class="form-control-file" id="title" name="image">
		  </div>

		  <button type="submit" class="btn btn-primary">Submit</button>
		</form>
	</div>


@endsection