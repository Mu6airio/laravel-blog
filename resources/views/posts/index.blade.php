@extends('layouts.app')

@section('content')

    <h1>Posts</h1>
    @if(count($posts) > 0)
        @foreach($posts as $post)
        @if($post->user->gender == 2 && Auth::user()->gender ==2)
            <div class="well">
                <div class="row">
                    <div class="col-md-4 col-sm-4">
                        <img src="{{url('../')}}/storage/cover_images/{{$post->cover_image}}" width="210px" height="150px">
                    </div>
                    <div class="col-md-8 col-sm-8">
                        <h3><a href="/posts/{{$post->id}}">{{$post->title}}</a></h3>
                        <small>Written on {{$post->created_at}} by {{$post->user->name}}</small>
                    </div>
                </div>
            </div>
            @elseif($post->user->gender == 1 && Auth::user()->gender ==1)
            <div class="well">
                <div class="row">
                    <div class="col-md-4 col-sm-4">
                        <img src="{{url('../')}}/storage/cover_images/{{$post->cover_image}}" width="210px" height="150px">
                    </div>
                    <div class="col-md-8 col-sm-8">
                        <h3><a href="/posts/{{$post->id}}">{{$post->title}}</a></h3>
                        <small>Written on {{$post->created_at}} by {{$post->user->name}}</small>
                    </div>
                </div>
            </div>
  
            @endif

        @endforeach
        {{$posts->links()}}
    @else
        <p>No posts found</p>
    @endif
@endsection
