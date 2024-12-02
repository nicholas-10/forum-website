<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Search</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
<style>
    .card-hover:hover {
        background-color: rgb(255, 228, 228);
        opacity: 90%;
    }
</style>
<body class="d-flex flex-column min-vh-100">

    @include('layouts.navbar')
    {{-- <h1>Welcome to the Home Page</h1> --}}
    <div class="container flex-grow-1">
    <div class="mx-auto d-flex gap-4 mb-4">
        <form class="d-flex " action={{route('search')}} role="search">
            <button type="submit"  class="btn btn-primary">Posts</button>
        </form>
        <form class="d-flex" action={{route('search-article')}} role="search">
            <button type="submit" class="btn btn-primary">Articles</button>

        </form>
    </div>

        <div class="row justify-content-center">
            @foreach ($posts as $post)
            <div class="col-md-4 mb-4">
                <div class="card card-hover" >
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

            </div>
            @endforeach
            <div class="d-flex justify-content-center">
                {{$posts->links()}}
            </div>
        </div>
    </div>

    @include('layouts.footer')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
