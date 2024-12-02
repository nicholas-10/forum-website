<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <title>Login</title>
</head>
<body class="d-flex flex-column min-vh-100">
    <div class="container flex-grow-1">
        <form class="border rounded p-4 d-flex flex-column gap-3" style="margin-top: 100px" action="{{ route('login') }}" method="POST">
            @csrf
            <h2>Login</h2>
            <div>
                <label for="validationServer01" class="form-label fw-bold">Email</label>
                <input type="text" class="form-control" value="{{ old('email') }}" name="email" id="validationServer01">
                @error('email')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror

                {{-- <div class="valid-feedback">
                    Looks good!
                </div> --}}
            </div>
            <div>
                <label for="validationServer02" class="form-label fw-bold">Password</label>
                <input type="password" class="form-control" name="password" id="validationServer02">
                @error('password')
                    <span style="color:red">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <button class="btn btn-primary" type="submit">Login</button>
            </div>
        </form>
        <div class="text-center mt-2">
            <span>Don't have an account?</span>
            <a href={{route('sign-up')}}>Sign-Up</a>
            <span>or go back
                <a href={{route('home')}}>Home</a>
            without logging in.</span>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>
