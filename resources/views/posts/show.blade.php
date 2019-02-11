@extends('layouts.app')

@section('content')
    <a href="/posts" class="btn btn-default">Go Back</a>
    <h1>{{$post->title}}</h1>
    @if ($post->cover_image != 'noimage.jpg')
    <img src="{{asset('cover_image/public/cover_images/'.$post->cover_image)}}" width="210px" height="150px">
    @endif
    <br><br>
    <div>
        {!!$post->body!!}
    </div>
    <hr>
    <small>Written on {{$post->created_at}} by {{$post->name}}</small>
    <hr>
    @if(!Auth::guest())
        @if(Auth::user()->id == $post->user_id)




            <a href="/posts/{{$post->id}}/edit" class="btn btn-default">Edit</a>



            {!!Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                {{Form::hidden('_method', 'DELETE')}}
                {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
            {!!Form::close()!!}
        @endif
    @endif

    @foreach ($post->comments as $comment)
    <tr>

      	<div class="comment">

          <p><strong>Comment:</strong><br/>{{$comment->comment}}</p>
        </div>

    </tr>
    @endforeach

    <div class="row">
      <div id="comment-form" class="col-md-8 col-md-offset-2" style="margin-top: 50px;">
        {{ Form::open(['route' => ['comments.store', $post->id], 'method' => 'POST']) }}


            <div class="col-md-12">
              {{ Form::label('comment', "Comment:") }}
              {{ Form::textarea('comment', null, ['class' => 'form-control', 'rows' => '5']) }}

              {{ Form::submit('Add Comment', ['class' => 'btn btn-success btn-block', 'style' => 'margin-top:15px;']) }}
            </div>
          </div>

        {{ Form::close() }}
      </div>
    </div>

@endsection
