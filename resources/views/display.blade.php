@extends('home')
{{-- @extends('search') --}}

<style>
    .card-hover:hover {
        background-color: rgb(255, 228, 228);
        opacity: 90%;
    }
</style>
@section('content')
    <div class="row justify-content-center">
        @foreach ($posts as $post)
            <div class="card card-hover" style="width: 25rem;">
                <a style="color: inherit; text-decoration: none;" href="{{ route('posts.show', $post->slug) }}" class="">
                    <div class="card-body">
                        <h5 class="card-title">{{ $post->title }}</h5>
                        <h6 class="card-subtitle mb-2 text-body-secondary">
                            {{-- {{$post}} --}}
                            By: {{ $post->name }} | Date: {{ $post->datetime_posted }} | Likes: {{$post->likes}}

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
@endsection
