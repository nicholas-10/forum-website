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
    .card-hover:hover {
        background-color: rgb(255, 228, 228);
        opacity: 90%;
    }
</style>
<body>

    @include('layouts.navbar')
    {{-- <h1>Welcome to the Home Page</h1> --}}
    <div class="mx-auto">
        <form class="d-flex " action={{route('search')}} role="search" style="margin-right: 15px;">
            <button type="submit"  class="btn btn-secondary">Posts</button>
        </form>
        <form class="d-flex" action={{route('search-article')}} role="search" style="margin-right: 15px;">
            <button type="submit" class="btn btn-secondary">Articles</button>

        </form>
    </div>


        <div class="row justify-content-center">
            @foreach ($posts as $post)
                <div class="card card-hover" style="width: 25rem;">
                    <a style="color: inherit; text-decoration: none;" href="{{ route('posts.show', $post->slug) }}" class="">
                        <div class="card-body">
                            <h5 class="card-title">{{ $post->title }}</h5>
                            <h6 class="card-subtitle mb-2 text-body-secondary">
                                {{-- {{$post}} --}}
                                By: {{ $post->name }} | Date: {{ $post->datetime_posted }}
                                @if(Route::currentRouteName() == 'search')
                                    | Likes: {{$post->likes}}
                                @endif


                            </h6>
                            <p class="card-text">
                                {{ substr($post->content, 0, 200) }}...
                            </p>
                        </div>
                    </a>

                </div>

                <br>
            @endforeach
            {{$posts}}
        </div>

    @include('layouts.footer')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
