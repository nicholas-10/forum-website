<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Articles</title>
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
    <div class="container flex-grow-1">
        @foreach ($articles as $article)
        <div class="card card-hover mx-auto mb-4" style="width: 50%; box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
            <a href="{{ route('article.show', $article->slug) }}" style="color: inherit; text-decoration: none;">
                <div class="card-body">
                    <h5 class="card-title">{{$article->title}}</h5>
                        <div class="card mb-3">
                            <img src="{{url($article->image_path)}}" class="card-img-top mx-auto" style="" alt="...">
                        </div>
                    <h6 class="card-subtitle mb-2 text-muted">By: {{ $article->name }} | Date: {{ $article->datetime_posted }}</h6>
                    <p class="card-text">{{substr($article->content, 0, 500)}}</p>
                </div>
            </a>
        </div>
        @endforeach
        <div class="d-flex justify-content-center">
            {{$articles->links()}}
        </div>
    </div>

    @include('layouts.footer')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
