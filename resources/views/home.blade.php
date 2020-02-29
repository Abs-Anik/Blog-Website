@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    <!-- @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in! -->

                    <a href="{{url('/create')}}" class="btn btn-primary">Create Post</a>
                    <br><br>
                    <h3>Your Blog Posts</h3>
                    @if(count($posts)>0)

                    <table class="table">
                      <thead>
                        <tr>
                          <th scope="col">Title</th>
                          <th scope="col">Edit</th>
                          <th scope="col">Delete</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($posts as $post)
                        <tr>
                          <td>{{$post->title}}</td>
                          <td>
                              <a href="{{url('/edit/'.$post->id)}}" class="btn btn-info">Edit</a>
                          </td>
                          <td>
                             <a href="{{url('/destroy/'.$post->id)}}" class="btn btn-danger">Delete</a> 
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>       
                    @else

                    <p>No Posts are available</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
