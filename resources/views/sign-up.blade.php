<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
<body>
    <form class="row g-3" action={{ route('sign-up') }} method="POST" style="margin: 10%">
        @csrf
        <div class="col-md-4">
            <label for="validationDefault01" class="form-label">Username</label>
            <input type="text" name="name" class="form-control" id="validationDefault01" value="{{ old('name') }}" required>
            @error('name')
                <span style="color:red;">{{ $message }}</span>
            @enderror
        </div>

        <div class="col-md-4">
            <label for="validationDefault02" class="form-label">Email</label>
            <input type="text" name="email" class="form-control" id="validationDefault02" value="{{ old('email') }}" required>
            @error('email')
                <span style="color:red;">{{ $message }}</span>
            @enderror
        </div>

        <div class="col-md-4">
            <label for="validationDefault02" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" id="validationDefault02" value="" required>
            @error('password')
                <span style="color:red;">{{ $message }}</span>
            @enderror
        </div>

        <div class="col-md-6">
          <label for="validationDefault03" class="form-label">Age</label>
          <input type="number" name="age" class="form-control" id="validationDefault03" required>
          @error('age')
              <span style="color:red;">{{ $message }}</span>
          @enderror
        </div>

        {{-- <div class="col-12">
          <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="invalidCheck2" required>
            <label class="form-check-label" for="invalidCheck2">

            </label>
          </div>
        </div> --}}
        <div class="form-check">
            <input class="form-check-input" type="radio" name="gender" id="flexRadioDefault1" value="male">
            <label class="form-check-label" for="flexRadioDefault1">
                Male
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="gender" id="flexRadioDefault2" value="female">
            <label class="form-check-label" for="flexRadioDefault2">
                Female
            </label>
         </div>
        @error('gender')
            <span style="color:red;">{{ $message }}</span>
        @enderror

        <div class="col-12">
          <button class="btn btn-primary" type="submit">Sign Up</button>
        </div>
        <div class="col-12">
            <p>Or go back home without signing up</p>
            <a class="btn btn-primary" href={{route('home')}}>Home</a>
        </div>

      </form>

      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>
