<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$post->title}}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
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

    .like-btn.active:hover{
        background-color: rgb(0, 225, 0);
    }

    .like-btn:hover{
        background-color: lime;
    }

</style>
<body class="d-flex flex-column min-vh-100">

    @include('layouts.navbar')
    <div class="container flex-grow-1">
    {{-- <h1>Welcome to the Home Page</h1> --}}
    <div class="card mb-4">
        <div class="card-body">
          <h5 class="card-title">{{$post->title}}</h5>
          {{-- {{print_r($post)}} --}}
          <h6 class="card-subtitle mb-2 text-muted">By: {{ $post->name }} | Date: {{ $post->datetime_posted }} | Likes: {{$post->likes}}</h6>
          <p class="card-text">{{$post->content}}</p>
          @auth
            <form action="{{route('like.post')}}" method="POST">
                @csrf
                {{-- <button type="submit" value="hello" name="test">Test</button> --}}
                @if (!$post->is_liked_by_user)
                    <button type="submit"  id="like-button" value="like" name="likestatus" class="btn like-btn ">Like</button>
                @else
                    <button type="submit"  id="like-button" value="no-like" name="likestatus" class="btn like-btn active">Unlike</button>
                @endif

                <input type="hidden" name="post_id" value={{$post->id}}>
                {{-- data-bs-toggle="button">Like</button> --}}
            </form>
            @endauth
        </div>
    </div>
      {{-- {{$comments}} --}}
    @auth
        <form class="mb-4" action={{route(('comment'))}} method="POST">
            @csrf
            <div class="form-floating d-flex gap-4 align-items-center">
                <textarea name="content" class="form-control" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
                <label for="floatingTextarea">Comment</label>
                <button type="submit" class="btn btn-primary">Comment</button>
                {{-- <a {{ url()->current() }}></a> --}}
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
                    {{-- <button type="submit" value="hello" name="test">Test</button> --}}
                    @if (!$comment->is_liked_by_user)
                        <button type="submit"  id="like-button" value="like" name="likestatus" class="btn like-btn ">Like</button>
                    @else
                        <button type="submit"  id="like-button" value="no-like" name="likestatus" class="btn like-btn active">Unlike</button>
                    @endif

                    <input type="hidden" name="comment_id" value={{$comment->id}}>
                        {{-- data-bs-toggle="button">Like</button> --}}
                </form>
            @endauth
            </div>
        </div>
        <br>
    @endforeach

    </div>

    @include('layouts.footer')
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
