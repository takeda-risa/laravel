@extends('layouts.not_logged_in')
 
@section('content')
  <h1>ログイン</h1>
 
  <form method="POST" action="{{ route('login') }}">
      @csrf
      <div>
          <label>
            ユーザー名:
            <input type="name" name="name">
          </label>
      </div>
 
      <div>
          <label>
            パスワード:
            <input type="password" name="password" >
          </label>
      </div>
 
      <input type="submit" value="ログイン" class="in_btn btn">
  </form>
@endsection