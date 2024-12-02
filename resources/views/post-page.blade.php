<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Upload a Post</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
<body class="d-flex flex-column min-vh-100">
    @include('layouts.navbar')
    <div class="container flex-grow-1">
    @auth
        <form class="border rounded p-4 d-flex flex-column gap-3" action={{ route('post') }} method="POST">
            @csrf
            <h2>Upload a Post</h2>
            <div class="d-flex flex-column fw-bold">
                <label for="exampleFormControlInput1" class="form-label">Post Title</label>
                <input type="text" class="form-control" id="postTitle" name="title" placeholder="e.g. What is Gender Equality?">
            </div>
            <div class="d-flex flex-column fw-bold">
                <label for="exampleFormControlTextarea1" class="form-label">Post Content</label>
                <textarea class="form-control" id="postContent" name="content" rows="3" placeholder="e.g. What is it exactly?"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Post</button>
        </form>
    @endauth
    @guest
        <script>
            window.location.href = "{{ route('login') }}";
        </script>
    @endguest
    </div>


    @include('layouts.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
