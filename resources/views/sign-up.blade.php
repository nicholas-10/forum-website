<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign-Up</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
<body class="d-flex flex-column min-vh-100">
    <div class="container flex-grow-1">
    <form class="border rounded p-4 d-flex flex-column gap-3" style="margin-top: 100px" action={{ route('sign-up') }} method="POST">
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
        <div>
            <label for="gender" class="form-label fw-bold">Gender</label>
            <div class="d-flex gap-4">
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
            </div>
        </div>
        @error('gender')
            <span style="color:red;">{{ $message }}</span>
        @enderror

        <div class="col-12">
          <button class="btn btn-primary" type="submit">Sign Up</button>
        </div>
      </form>
      <div class="text-center mt-2">
        <span>Already have an account?</span>
        <a href={{route('login')}}>Login</a>
        <span>or go back
            <a href={{route('home')}}>Home</a>
        without logging in.</span>
    </div>
    </div>

      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>
