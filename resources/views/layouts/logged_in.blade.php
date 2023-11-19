@extends('layouts.default')
 
@section('header')
<header class="header">
  <div>
    <a href="{{ route('posts.index') }}">
      マイクロブログ
    </a>
  </div>
  <div>{{ Auth::user()->name }}さん、こんにちは！</div>
  <ul class="header_nav">
    <li>
      <a href="{{ route('posts.create') }}">新規投稿</a>
    </li>
    <li>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <input type="submit" value="ログアウト">
        </form>
    </li>
  </ul>
  
</header>
@endsection