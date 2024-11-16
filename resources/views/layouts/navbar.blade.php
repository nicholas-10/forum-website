
<nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <!-- <a class="navbar-brand" href="#">Navbar</a> -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav">  {{-- me-auto mb-2 mb-lg-0"> --}}
                <li class="nav-item">
                    <a class="{{'nav-link' . (request()->routeIs('home') ? ' active nav-link-bold' : '')}}" aria-current="page" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="{{'nav-link' . (request()->routeIs('post-page') ? ' active nav-link-bold' : '')}}" href="/post">Post</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle {{'nav-link' . (request()->routeIs('newest') || request()->routeIs('most-liked')  ? ' active nav-link-bold' : '')}}"  role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        @if (request()->routeIs('most-liked'))
                            Most Liked
                        @elseif (request()->routeIs('newest'))
                            Newest
                        @else
                            Explore
                        @endif

                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="/most-liked">Most Liked</a></li>
                        <li><a class="dropdown-item" href="/newest">Newest</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="{{'nav-link' . (request()->routeIs('about-us') ? ' active nav-link-bold' : '')}}" href="/about-us">About Us</a>
                </li>

                </ul>
                <div class="mx-auto">
                    <form class="d-flex" role="search" style="margin-right: 15px;">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>

                </div>


                <div class="flex-column">
                    @guest
                        <a href="/sign-up" class="btn btn-outline-success" type="submit">Sign Up</a>
                    @endguest
                    @guest
                    <a href="/login" class="btn btn-outline-success" type="submit">Login</a>
                    @endguest
                </div>
                <div class="d-flex gap-2 align-items-center">
                    @auth
                        {{-- <div class="position-relative"> --}}
                            <a class="nav-item nav-link" aria-current="page" href="/profile">Hello, {{Auth::user()->name}}</a>
                        {{-- </div> --}}
                        <form class="my-auto" action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button class="btn btn-outline-success" type="submit">Logout</button>
                        </form>
                    @endauth
                </div>


        </div>
      </nav>
<br>
