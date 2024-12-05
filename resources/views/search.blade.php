@extends('layouts.layout')

@section('title', 'Search')

@section('content')
<div class="mx-auto d-flex gap-4 mb-4">
    <form class="d-flex " action={{route('search')}} role="search">
        <button type="submit"  class="btn btn-primary">Posts</button>
        <input type="hidden"  name="search" aria-label="Search" value={{request('search')}}>
    </form>
    <form class="d-flex" action={{route('search.article')}} role="search">
        <button type="submit" class="btn btn-primary">Articles</button>
        <input type="hidden"  name="search" aria-label="Search" value={{request('search')}}>
    </form>
</div>
@isset($posts)
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
                            {{ substr($post->content, 0, 100) }}@if(strlen($post->content) > 100){{ '...' }}@endif
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
    @empty($posts[0])
        <h2 class="text-center">No posts found...</h2>
    @endempty
@endisset
@isset($articles)
    @foreach ($articles as $article)
    <div class="card card-hover mx-auto mb-4" style="width: 50%; box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
        <a href="{{ route('article.show', $article->id) }}" style="color: inherit; text-decoration: none;">
            <div class="card-body">
                <h5 class="card-title">{{$article->title}}</h5>
                    <div class="card mb-3">
                        <img src="{{url($article->image_path)}}" class="card-img-top mx-auto" style="" alt="...">
                    </div>
                <h6 class="card-subtitle mb-2 text-muted">By: {{ $article->name }} | Date: {{ $article->datetime_posted }}</h6>
                <p class="card-text" style="text-align: justify">
                    {{ substr($article->content, 0, 250) }}@if(strlen($article->content) > 250){{ '...' }}@endif
                </p>
            </div>
        </a>
    </div>
    @endforeach
    <div class="d-flex justify-content-center">
        {{$articles->links()}}
    </div>
    @empty($articles[0])
        <h2 class="text-center">No articles found...</h2>
    @endempty
@endisset
@endsection
