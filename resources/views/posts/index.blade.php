@extends('layouts.logged_in')
 
@section('title', $title)
 
@section('content')
  <h1>{{ $title }}</h1>
  <a href="{{ route('posts.create') }}">新規投稿</a>
  
  <ul class="recommended_users">
    @forelse($recommended_users as $recommended_user)
      <li>
        <a href="{{ route('users.show', $recommended_user) }}">{{ $recommended_user->name }}</a>
        @if(Auth::user()->isFollowing($recommended_user))
          <form method="post" action="{{ secure_url(route('follows.destroy', $recommended_user))}}" class="follow">
            @csrf
            @method('delete')
            <input type="submit" value="フォロー解除">
          </form>
        @else
          <form method="post" action="{{ secure_url(route('follows.store')) }}" class="follow">
            @csrf
            <input type="hidden" name="follow_id" value="{{ $recommended_user->id }}">
            <input type="submit" value="フォロー">
          </form>
        @endif
      </li>
    @empty
      <li>他のユーザーが存在しません</li>
    
    @endforelse
  </ul>
  
  <ul>
      @forelse($posts as $post)
          <li>
            {{ $post->user->name }}:
            {!! nl2br(e($post->comment)) !!}<br>
            ({{ $post->created_at }})
            
            @if($user->id == $post->user_id)
              [<a href="{{ route('posts.edit', $post) }}">編集</a>]
              <form method="post" class="delete" action="{{ route('posts.destroy', $post) }}">
                @csrf
                @method('delete')
                <input type="submit" value="削除">
              </form>
            @endif
            
          </li>
      @empty
          <li>書き込みはありません。</li>
      @endforelse
  </ul>
@endsection