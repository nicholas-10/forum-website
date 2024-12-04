<nav class="navbar sticky-top navbar-expand-lg" style="background-color: white; box-shadow: rgba(0, 0, 0, 0.1) 0px 2px 15px;">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('home') }}"><img src="{{ asset('logo-transparent.png') }}" alt="Gender Voices" width="80"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="{{'nav-link' . (request()->routeIs('articles') ? ' active nav-link-bold' : '')}}" href="{{ route('articles') }}">Articles</a>
                </li>
                <li class="nav-item">
                    <a class="{{'nav-link' . (request()->routeIs('article.upload') ? ' active nav-link-bold' : '')}}" href="{{ route('article.upload') }}">Upload Article</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle {{'nav-link' . (request()->routeIs('newest') || request()->routeIs('most.liked')  ? ' active nav-link-bold' : '')}}"  role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        @if (request()->routeIs('most.liked'))
                            Most Liked
                        @elseif (request()->routeIs('newest'))
                            Newest
                        @else
                            Posts
                        @endif
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('most.liked') }}">Most Liked</a></li>
                        <li><a class="dropdown-item" href="{{ route('newest') }}">Newest</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="{{'nav-link' . (request()->routeIs('post.page') ? ' active nav-link-bold' : '')}}" href="{{ route('post.page') }}">Upload Post</a>
                </li>
            </ul>

            <div class="d-flex gap-4">
                <form class="my-auto d-flex align-items-center justify-content-center" action="{{ route('search') }}" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search here..." name="search" aria-label="Search">
                </form>

                <div class="flex-column">
                    @guest
                        <a href="{{ route('signup.page') }}" class="btn btn-outline-success">Sign Up</a>
                    @endguest
                    @guest
                    <a href="{{ route('login.page') }}" class="btn btn-outline-success">Login</a>
                    @endguest
                </div>
                <div class="d-flex gap-2 align-items-center">
                    @auth
                        <a class="nav-item nav-link" aria-current="page">Hello, {{Auth::user()->name}}!</a>
                        <form class="my-auto" action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button class="btn btn-outline-success" type="submit">Logout</button>
                        </form>
                    @endauth
                </div>
            </div>
        </div>
    </nav>
<br>
