@extends('layouts.layout')

@section('title', $article->title)

@section('content')
<style>
    .delete-btn {
        background-color: transparent;
        border: none;
        padding: 0px;
        margin-right: 5px;
    }
    </style>
<div class="card mx-auto mb-5" style="">
    <div class="card-body">
        <div class="d-flex justify-content-between mb-2">
            <h5 class="card-title">{{ $article->title }}</h5>
            @auth
            <form action="{{route('delete.article')}}" method="POST">
                @csrf
                @if ($article->user_id == Auth::user()->id || Auth::user()->is_admin)
                    <button type="submit" value="delete" name="delete" class="delete-btn"><img style="width: 20px" src="{{ asset('/delete.png') }}" alt="Delete"></button>
                @endif
                <input type="hidden" name="article_id" value={{$article->id}}>
            </form>
            @endauth
        </div>
        <div class="card mb-3">
            <img src="{{ url($article->image_path) }}" class="card-img-top mx-auto" alt="...">
        </div>
        <h6 class="card-subtitle mb-2 text-muted">By: {{ $article->name }} | Date: {{ $article->datetime_posted }}</h6>
        <p class="card-text" style="text-align: justify">{{$article->content}}</p>
    </div>
</div>
@endsection
