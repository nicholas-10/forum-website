@extends('layouts.layout')

@section('title', $post->title)

@section('content')
<style>
.like-btn {
    border: none;
    padding: 0px;
    background-color: transparent;
}

.delete-btn {
    border: none;
    padding: 0px;
    margin-right: 5px;
    background-color: transparent;
}
</style>
<div class="card mb-4">
    <div class="card-body">
      <h5 class="card-title">{{$post->title}}</h5>
      <h6 class="card-subtitle mb-2 text-muted">By: {{ $post->gender }} ({{ $post->age }}) | Date: {{ $post->datetime_posted }} | Likes: {{$post->likes}}</h6>
      <p class="card-text mb-2">{{$post->content}}</p>
      <div class="mx-auto d-flex flex-row justify-content-between">
        @auth
        <form action="{{route('like.post')}}" method="POST">
            @csrf
            @if (!$post->is_liked_by_user)
                <button type="submit" value="like" name="likestatus" class="like-btn"><img style="width: 20px" src="{{ asset('/not-like.png') }}" alt="Like"></button>
            @else
                <button type="submit" value="no-like" name="likestatus" class="like-btn"><img style="width: 20px" src="{{ asset('/like.png') }}" alt="Unlike"></button>
            @endif
            <input type="hidden" name="post_id" value={{$post->id}}>
        </form>
        @endauth
        @auth
        <form action="{{route('delete.post')}}" method="POST">
            @csrf
            @if ($post->user_id == Auth::user()->id || Auth::user()->is_admin)
                <button type="submit" value="delete" name="delete" class="delete-btn"><img style="width: 20px" src="{{ asset('/delete.png') }}" alt="Delete"></button>
            @endif
            <input type="hidden" name="post_id" value={{$post->id}}>
        </form>
        @endauth
      </div>
    </div>
</div>
@auth
    <form class="mb-4" action={{route(('comment'))}} method="POST">
        @csrf
        <div class="form-floating d-flex gap-4 align-items-center">
            <textarea name="content" class="form-control" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
            <label for="floatingTextarea">Comment</label>
            <button type="submit" class="btn">Comment</button>
        </div>
    </form>
@endauth
@guest
    <h5 class="mb-4">
        <a href="/login">Login</a>
        to Comment
    </h5>
@endguest
<hr>
@foreach ($comments as $comment)
    <div class="card">
        <div class="card-body">
            <h6 class="card-subtitle mb-2 text-muted">By: {{ $comment->name }} | Date: {{ $comment->datetime_commented }} | Likes: {{$comment->comment_likes_count}}</h6>
            <p class="card-text mb-2">{{$comment->content}}</p>
            <div class="mx-auto d-flex flex-row justify-content-between">
                @auth
                    <form action="{{route('like.comment')}}" method="POST">
                        @csrf
                        @if (!$comment->is_liked_by_user)
                            <button type="submit" value="like" name="likestatus" class="like-btn"><img style="width: 20px" src="{{ asset('/not-like.png') }}" alt="Like"></button>
                        @else
                            <button type="submit" value="no-like" name="likestatus" class="like-btn"><img style="width: 20px" src="{{ asset('/like.png') }}" alt="Unlike"></button>
                        @endif
                        <input type="hidden" name="comment_id" value={{$comment->id}}>
                    </form>
                @endauth
                @auth
                <form action="{{route('delete.comment')}}" method="POST">
                    @csrf
                    @if ($comment->user_id == Auth::user()->id || Auth::user()->is_admin)
                        <button type="submit" value="delete" name="delete" class="delete-btn"><img style="width: 20px" src="{{ asset('/delete.png') }}" alt="Delete"></button>
                    @endif
                    <input type="hidden" name="comment_id" value={{$comment->id}}>
                </form>
                @endauth
            </div>
        </div>
    </div>
    <br>
@endforeach
<script>
    document.getElementById('like-button').addEventListener('click', function(){
        const isActive = this.getAttribute('aria-pressed') === 'true';
        if (isActive) {
            const data = {
                    action: "like"
            };
            fetch('../home', {
                method: 'POST',
                body: JSON.stringify(data)
            });

        } else {
            console.log('inactive');
        }
    });
</script>
@endsection
