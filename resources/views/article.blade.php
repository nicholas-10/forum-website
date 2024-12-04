@extends('layouts.layout')

@section('title', $article->title)

@section('content')
<div class="card mx-auto mb-5" style="">
    <div class="card-body">
        <h5 class="card-title">{{ $article->title }}</h5>
        <div class="card mb-3">
            <img src="{{ url($article->image_path) }}" class="card-img-top mx-auto" alt="...">
        </div>
        <h6 class="card-subtitle mb-2 text-muted">By: {{ $article->name }} | Date: {{ $article->datetime_posted }}</h6>
        <p class="card-text">{{$article->content}}</p>
    </div>
</div>
@endsection
