@extends('layouts.logged_in')
@section('title', $title)
@section('content')
  <h1>{{ $title }}</h1>
  <dl>
    <dt>ユーザー名</dt>
    <dd>{{ $user->name }}</dd>
  </dl>
  @if(Auth::id() !== $user->id)
    @if(Auth::user()->isFollowing($user))
      <form method="post" action="{{ secure_url(route('follows.destroy', $user))}}" class="follow">
        @csrf
        @method('delete')
        <input type="submit" value="フォロー解除">
      </form>
    @else
      <form method="post" action="{{ secure_url(route('follows.store')) }}" class="follow">
        @csrf
        <input type="hidden" name="follow_id" value="{{ $user->id }}">
        <input type="submit" value="フォローする">
      </form>
    @endif  
  @endif
  
  <ul class="recommended_posts">
    @forelse($recommended_posts as $post)
      <li class="post">
        <div class="post_content">
          <div class="post_body">
            <div class="post_body_heading">
              投稿者:{{ $post->user->name }}
              ({{ $post->created_at }})
            </div>
            <div class="post_body_main">
              <div class="post_body_main_comment">
                {{ $post->comment }}
              </div>
            </div>
          </div>
        </div>
      </li>
    @empty
      <li>投稿はありません。</li>
    @endforelse
  </ul>
@endsection