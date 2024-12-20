@extends('layouts.layout')

@section('title', 'Upload Article')

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
<form class="border rounded p-4 d-flex flex-column gap-3 bg-white" style="margin-top: 5vh" action="{{ route('article.upload') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <h2 style="font-weight: bold;">Upload an Article</h2>
    <div class="d-flex flex-column fw-bold">
        <label for="title" class="form-label">Article Title</label>
        <input type="text" name="title" class="form-control" id="title" placeholder="e.g. The Importance of Gender Equality">
    </div>
    <div class="d-flex flex-column fw-bold">
        <label for="content" class="form-label">Article Content</label>
        <textarea class="form-control" name="content" placeholder="e.g. Gender equality is..." id="content"></textarea>
    </div>
    <div class="d-flex flex-column fw-bold">
        <label for="image" class="form-label">Article Image</label>
        <input type="file" name="image" id="image" accept="image/*" required>
    </div>
    <button type="submit" class="btn upload-btn">Upload</button>
</form>
@endsection
