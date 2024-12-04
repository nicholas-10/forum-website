@extends('layouts.layout')

@section('title', 'Posts')

@section('content')
<div class="row justify-content-center">
    @foreach ($posts as $post)
        <div class="col-md-4 mb-4">
            <div class="card card-hover" style="width: 25rem;">
                <a style="color: inherit; text-decoration: none;" href="{{ route('posts.show', $post->id) }}" class="">
                    <div class="card-body">
                        <h5 class="card-title">{{ $post->title }}</h5>
                        <h6 class="card-subtitle mb-2 text-body-secondary">
                            By: {{ $post->gender }} ({{ $post->age }}) | Date: {{ $post->datetime_posted }} | Likes: {{$post->likes}}
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
@endsection
