@extends('layouts.app')

@section('content')
    <h1>Create Post</h1>
{{-- <form action="{{route('add.post')}}" method="post"> --}}
{{-- <form action="{{URL::action('PostsController@store')}}" method="post"> --}}

    {{-- {{ csrf_field() }} --}}
    {{-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> --}}
        {{-- <form action="PostsController@store" method="POST"> --}}
       
            {{-- <div class="form-group">
            <label for="title">Title</label><Br>
            <input type="text" id="title" class="form-control" placeholder="Title">
        </div>
        <div class="form-group">
            <label for="body">Body</label><Br>
            <textarea id="body" rows="10" class="form-control" placeholder="Body text"></textarea>
            <input type="submit" value="Submit" class="btn btn-primary">
        </div>
        
    </form> --}}

   


    {!! Form::open(['action' => 'PostsController@store', 'method' => 'POST']) !!}
        <div class="form-group">
            {{Form::label('title', 'Title')}}
            {{Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Title'])}}
        </div>
        <div class="form-group">
            {{Form::label('body', 'Body')}}
            {{Form::textarea('body', '', ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Body Text'])}}
        </div>
        {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}



@endsection