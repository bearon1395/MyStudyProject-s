@extends('layouts.app')

@section('content')
    <h1>Edit Post</h1>
{{-- <form action="{{route('edit.post', $post->$id)}}" method="post">
    {{ csrf_field() }}
        <div class="form-group">
            <label for="title">Title</label><Br>
            <input type="text" id="title" class="form-control" placeholder="Title">
        </div>
        <div class="form-group">
            <label for="body">Body</label><Br>
            <textarea id="body" rows="10" class="form-control" placeholder="Body text"></textarea>
            <input type="submit" value="Submit" class="btn btn-primary">
        </div>
        
    </form> --}}

    {!! Form::open(['action' => ['PostsController@update', $post->id], 'method' => 'POST']) !!}
        <div class="form-group">
            {{Form::label('title', 'Title')}}
            {{Form::text('title', $post->title, ['class' => 'form-control', 'placeholder' => 'Title'])}}
        </div>
        <div class="form-group">
            {{Form::label('body', 'Body')}}
            {{Form::textarea('body', $post->body, ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Body Text'])}}
        </div>
        {{Form::hidden('_method','PUT')}}
        {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}
   




@endsection