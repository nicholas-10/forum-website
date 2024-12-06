@extends('layouts.layout')

@section('title', 'Register')

@section('content')
<style>
.form-check-input:checked{
    border-color: var(--brown);
    background-color: var(--brown);
    box-shadow: none;
}
</style>

<form class="border rounded p-4 d-flex flex-column gap-3 bg-white" style="margin-top: 5vh" action={{ route('signup') }} method="POST">
    @csrf
    <h2>Sign Up</h2>
    <div>
        <label for="validationDefault01" class="form-label fw-bold">Username</label>
        <input type="text" name="name" class="form-control" id="validationDefault01" value="{{ old('name') }}" required>
        @error('name')
            <span style="color:red;">{{ $message }}</span>
        @enderror
    </div>

    <div>
        <label for="validationDefault02" class="form-label fw-bold">Email</label>
        <input type="text" name="email" class="form-control" id="validationDefault02" value="{{ old('email') }}" required>
        @error('email')
            <span style="color:red;">{{ $message }}</span>
        @enderror
    </div>

    <div>
        <label for="validationDefault02" class="form-label fw-bold">Password</label>
        <input type="password" name="password" class="form-control" id="validationDefault02" value="" required>
        @error('password')
            <span style="color:red;">{{ $message }}</span>
        @enderror
    </div>

    <div>
      <label for="validationDefault03" class="form-label fw-bold">Age</label>
      <input type="number" name="age" class="form-control" id="validationDefault03" value="{{ old('age') }}" required>
      @error('age')
          <span style="color:red;">{{ $message }}</span>
      @enderror
    </div>

    <div>
        <label for="gender" class="form-label fw-bold">Gender</label>
        <div class="d-flex gap-4">
            <div class="form-check">
                <input class="form-check-input" type="radio" name="gender" id="flexRadioDefault1" {{ (old('gender') == 'Male') ? 'checked' : '' }} value="Male">
                <label class="form-check-label" for="flexRadioDefault1">
                    Male
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="gender" id="flexRadioDefault2" {{ (old('gender') == 'Female') ? 'checked' : '' }} value="Female">
                <label class="form-check-label" for="flexRadioDefault2">
                    Female
                </label>
            </div>
        </div>
    </div>
    @error('gender')
        <span style="color:red;">{{ $message }}</span>
    @enderror

    <button class="btn btn-primary" type="submit">Sign Up</button>
</form>
<div class="text-center mt-2">
    <span>Already have an account?</span>
    <a href={{route('login')}}>Login</a>
    <span>
</div>
@endsection
