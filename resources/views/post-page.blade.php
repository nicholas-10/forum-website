@extends('layouts.layout')

@section('title', 'Upload Post')

@section('content')
<style>
.upload-btn{
    background-color: var(--brown);
    border: none;
    color: white;
}

.upload-btn:hover{
    background-color: var(--dark-brown);
    border: none;
    color: white;
}

.upload-btn:active{
    background-color: var(--dark-brown) !important;
    border: none !important;
    color: white !important;
}
</style>
@auth
    <form class="border rounded p-4 d-flex flex-column gap-3 bg-white" style="margin-top: 5vh" action={{ route('post') }} method="POST">
        @csrf
        <h2 style="font-weight: bold;">Upload a Post</h2>
        <div class="d-flex flex-column fw-bold">
            <label for="exampleFormControlInput1" class="form-label">Post Title</label>
            <input type="text" class="form-control" id="postTitle" name="title" placeholder="e.g. What is Gender Equality?">
        </div>
        <div class="d-flex flex-column fw-bold">
            <label for="exampleFormControlTextarea1" class="form-label">Post Content</label>
            <textarea class="form-control" id="postContent" name="content" rows="3" placeholder="e.g. What is it exactly?"></textarea>
        </div>
        <button type="submit" class="btn upload-btn">Post</button>
    </form>
@endauth
@endsection
