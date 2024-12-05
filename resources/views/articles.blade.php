@extends('layouts.layout')

@section('title', 'Articles')

@section('content')
@foreach ($articles as $article)
    <div class="card card-hover mx-auto mb-4" style="width: 50%; box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
        <a href="{{ route('article.show', $article->slug) }}" style="color: inherit; text-decoration: none;">
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
@endsection
