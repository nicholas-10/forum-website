<style>
.center-tabs{
    gap: 50px;
}

.nav-link:hover{
    font-weight: bold;
    color: var(--brown);
    text-decoration: none;
}

.nav-link.active{
    font-weight: bold;
    color: var(--dark-brown) !important;
    text-decoration: none;
}

.nav-link.dropdown-toggle.show:hover{
    font-weight: bold;
    color: var(--brown);
    text-decoration: none;
}

.dropdown-item:hover{
    font-weight: bold;
    color: var(--brown);
    background-color: var(--beige);
    text-decoration: none;
}

.btn{
    background-color: var(--brown);
    border-color: var(--brown);
    color: white;
    text-decoration: none;
}

.btn:hover{
    background-color: var(--dark-brown);
    border-color: var(--brown);
    color: white;
    text-decoration: none;
}

.btn:active{
    background-color: var(--dark-brown) !important;
    border-color: var(--brown) !important;
    color: white !important;
    text-decoration: none !important;
}

.form-control:focus{
    border-color: var(--brown);
    box-shadow: none;
}

.form-control:active{
    border-color: var(--brown);
    box-shadow: none;
}

a{
    color: var(--dark-brown);
    text-decoration: none;
}

a:hover{
    text-decoration: underline;
}
</style>

<nav class="navbar sticky-top navbar-expand-lg px-4" style="background-color: white; box-shadow: rgba(0, 0, 0, 0.1) 0px 2px 15px;">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('home') }}"><img src="{{ asset('logo-transparent.png') }}" alt="Gender Voices" width="100"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-center center-tabs" id="navbarSupportedContent">
            <ul class="navbar-nav mb-2 mb-lg-0 gap-4">
                <li class="nav-item">
                    <a class="{{'nav-link' . (request()->routeIs('articles') ? ' active nav-link-bold' : '')}}" href="{{ route('articles') }}">Articles</a>
                </li>
                <li class="nav-item">
                    <a class="{{'nav-link' . (request()->routeIs('article.upload') ? ' active nav-link-bold' : '')}}" href="{{ route('article.upload') }}">Upload Article</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle {{'nav-link' . (request()->routeIs('popular.posts') || request()->routeIs('newest') || request()->routeIs('most.liked')  ? ' active nav-link-bold' : '')}}"  role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        @if (request()->routeIs('most.liked'))
                            Most Liked
                        @elseif (request()->routeIs('newest'))
                            Newest
                        @elseif (request()->routeIs('popular.posts'))
                            Popular
                        @else
                            Posts
                        @endif
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('popular.posts') }}">Popular</a></li>
                        <li><a class="dropdown-item" href="{{ route('most.liked') }}">Most Liked</a></li>
                        <li><a class="dropdown-item" href="{{ route('newest') }}">Newest</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="{{'nav-link' . (request()->routeIs('post.page') ? ' active nav-link-bold' : '')}}" href="{{ route('post.page') }}">Upload Post</a>
                </li>
            </ul>

            <form action="{{ route('search') }}" role="search">
                <input class="form-control me-2" placeholder="Search here..." @isset($search) value="{{$search}}" @endisset name="search" aria-label="Search">
            </form>
        </div>

        <div class="d-flex gap-4 align-items-center">
            @guest
                <a href="{{ route('signup.page') }}" class="btn">Sign Up</a>
                <a href="{{ route('login.page') }}" class="btn">Login</a>
            @endguest
            @auth
                <span>Welcome, <b style="color: var(--brown);">{{Auth::user()->name}}</b>!</span>
                <form class="my-auto" action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="btn" type="submit">Logout</button>
                </form>
            @endauth
        </div>
    </div>
</nav>
<br>
