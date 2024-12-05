@extends('layouts.layout')

@section('title', 'Search')

@section('content')
<div class="mx-auto d-flex gap-4 mb-4">
    <form class="d-flex " action={{route('search')}} role="search">
        <button type="submit"  class="btn btn-primary">Posts</button>
    </form>
    <form class="d-flex" action={{route('search.article')}} role="search">
        <button type="submit" class="btn btn-primary">Articles</button>
    </form>
</div>
<div class="row justify-content-center">
    @foreach ($posts as $post)
    <div class="col-md-4 mb-4">
        <div class="card card-hover" >
            <a style="color: inherit; text-decoration: none;" href="{{ route('posts.show', $post->id) }}" class="">
                <div class="card-body">
                    <h5 class="card-title">{{ $post->title }}</h5>
                    <h6 class="card-subtitle mb-2 text-body-secondary">
                        By: {{ $post->gender }} ({{ $post->age }}) | Date: {{ $post->datetime_posted }}
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
@endsection
