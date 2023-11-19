@extends('layouts.logged_in')
 
@section('title', $title)
 
@section('content')
  <h1>{{ $title }}</h1>
  <form method="POST" action="{{ route('posts.update',$post) }}">
      @csrf
      @method('patch')
      <div>
        <label>
            投稿内容：
            <textarea type="text" cols="40" rows="4" name="comment">{{ $post->comment }}</textarea>
        </label>  
      </div>
      
      <input type="submit" value="投稿">
  </form>
@endsection