@extends('layouts.layout')

@section('title', 'Login')

@section('content')
<form class="border rounded p-4 d-flex flex-column gap-4 bg-white" style="margin-top: 5vh" action="{{ route('login') }}" method="POST">
    @csrf
    <h2 style="font-weight: bold;">Login</h2>
    <div>
        <label for="validationServer01" class="form-label fw-bold">Email</label>
        <input type="text" class="form-control" value="{{ old('email') }}" name="email" id="validationServer01">
        @error('email')
            <span style="color:red">{{ $message }}</span>
        @enderror
    </div>
    <div>
        <label for="validationServer02" class="form-label fw-bold">Password</label>
        <input type="password" class="form-control" name="password" id="validationServer02">
        @error('password')
            <span style="color:red">{{ $message }}</span>
        @enderror
    </div>
    <button class="btn btn-primary" type="submit">Login</button>
</form>
<div class="text-center mt-2">
    <span>Don't have an account?</span>
    <a href={{route('signup')}}>Sign-Up</a>
    <span>
</div>
@endsection
