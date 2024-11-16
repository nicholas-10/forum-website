<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
<style>
    .like-btn.active {
        color: black;
        background-color: pink;
    }
    .like-btn {
        color: black;
        background-color: rgb(195, 160, 166);
    }

</style>
<body>

    @include('layouts.navbar')
    {{-- <h1>Welcome to the Home Page</h1> --}}
    <div class="card" style="width: 60rem; margin-left: 2rem">
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
          <a href="#" class="card-link">Card link</a>
          <a href="#" class="card-link">Another link</a>
        </div>
    </div>
      {{-- {{$comments}} --}}
    @auth
        <form action={{route(('comment'))}} method="POST">
            @csrf
            <div class="form-floating" style="width: 60rem; margin-left: 4rem">
                <textarea name="content" class="form-control" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
                <label for="floatingTextarea">Comment</label>
                <button type="submit" class="btn btn-primary">Submit</button>
                {{-- <a {{ url()->current() }}></a> --}}
            </div>
        </form>
    @endauth
    @guest
        <h5 style="width: 60rem; margin-left: 4rem">Login to comment</h5>
        <br>
    @endguest
    @foreach ($comments as $comment)
        <div class="card" style="width: 60rem; margin-left: 4rem">
            <div class="card-body">
            <h6 class="card-subtitle mb-2 text-muted">By: {{ $comment->name }} | Date: {{ $comment->datetime_commented }} | Likes: {{$comment->comment_likes_count}}
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
            </h6>
            <p class="card-text">{{$comment->content}}</p>
            <a href="#" class="card-link">Card link</a>
            <a href="#" class="card-link">Another link</a>
            </div>
        </div>
    @endforeach

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
