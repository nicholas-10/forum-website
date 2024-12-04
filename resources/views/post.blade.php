@extends('layouts.layout')

@section('title', $post->title)

@section('content')
<style>
.like-btn.active {
    color: black;
    border: none;
    background-color: lime;
}

.like-btn {
    color: black;
    border-color: lime;
    background-color: transparent;
}

.like-btn.active:hover {
    background-color: rgb(0, 225, 0);
}

.like-btn:hover {
    background-color: lime;
}
</style>
<div class="card mb-4">
    <div class="card-body">
      <h5 class="card-title">{{$post->title}}</h5>
      <h6 class="card-subtitle mb-2 text-muted">By: {{ $post->gender }} ({{ $post->age }}) | Date: {{ $post->datetime_posted }} | Likes: {{$post->likes}}</h6>
      <p class="card-text">{{$post->content}}</p>
      @auth
        <form action="{{route('like.post')}}" method="POST">
            @csrf
            @if (!$post->is_liked_by_user)
                <button type="submit"  id="like-button" value="like" name="likestatus" class="btn like-btn ">Like</button>
            @else
                <button type="submit"  id="like-button" value="no-like" name="likestatus" class="btn like-btn active">Unlike</button>
            @endif

            <input type="hidden" name="post_id" value={{$post->id}}>
        </form>
        @endauth
    </div>
</div>
@auth
    <form class="mb-4" action={{route(('comment'))}} method="POST">
        @csrf
        <div class="form-floating d-flex gap-4 align-items-center">
            <textarea name="content" class="form-control" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
            <label for="floatingTextarea">Comment</label>
            <button type="submit" class="btn btn-primary">Comment</button>
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
        <p class="card-text">{{$comment->content}}</p>
        @auth
            <form action="{{route('like.comment')}}" method="POST">
                @csrf
                @if (!$comment->is_liked_by_user)
                    <button type="submit"  id="like-button" value="like" name="likestatus" class="btn like-btn">Like</button>
                @else
                    <button type="submit"  id="like-button" value="no-like" name="likestatus" class="btn like-btn active">Unlike</button>
                @endif
                <input type="hidden" name="comment_id" value={{$comment->id}}>
            </form>
        @endauth
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
