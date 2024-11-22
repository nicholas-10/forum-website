<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <title>Document</title>
</head>
<body>
    <form class="row g-3" action="{{ route('login') }}" method="POST">
        @csrf
        <div class="col-md-4">
          <label for="validationServer01" class="form-label">Email</label>
          <input type="text" class="form-control" value="{{ old('email') }}" name="email" id="validationServer01">
            @error('email')
                <span class="text-red-500">{{ $message }}</span>
            @enderror

          {{-- <div class="valid-feedback">
            Looks good!
          </div> --}}
        </div>
        <div class="col-md-4">
          <label for="validationServer02" class="form-label">Password</label>
          <input type="password" class="form-control" name="password" id="validationServer02">
            @error('password')
                <span style="color:red">{{ $message }}</span>
            @enderror
        </div>
        <div class="col-12">
          <button class="btn btn-primary" type="submit">Submit form</button>
        </div>
    </form>
    <p>Don't have an account?</p>
    <a class="btn btn-primary" href={{route('sign-up')}}>Sign Up</a>
    <p>Or go back home without logging in</p>
    <a class="btn btn-primary" href={{route('home')}}>Home</a>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>
