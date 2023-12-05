@extends('layouts.default')
 
@section('header')
<header class="header">
  <div>
    <a href="{{ route('posts.index') }}" class="logo">
      micro blog.
    </a>
  </div>
  <div>{{ Auth::user()->name }}さん、こんにちは！</div>
  <ul class="header_nav">
    <li>
      <a href="{{ route('posts.create') }}" class="new_post">新規投稿</a>
    </li>
    <li>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <input type="submit" value="ログアウト" class="out_btn btn">
        </form>
    </li>
  </ul>
  
</header>
@endsection