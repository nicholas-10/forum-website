<footer>
    <ul class="nav justify-content-center my-2">
        <li class="nav-item"><a href="{{ route('home') }}#home-page" class="nav-link px-2 text-white hover-underline">Home</a></li>
        <li class="nav-item"><a href="{{ route('home') }}#faq-page" class="nav-link px-2 text-white hover-underline">FAQs</a></li>
        <li class="nav-item"><a href="{{ route('home') }}#contact-us-page" class="nav-link px-2 text-white hover-underline">Contact Us</a></li>
        <li class="nav-item"><a href="" class="nav-link px-2 text-white hover-underline" data-bs-toggle="modal" data-bs-target="#terms-modal">Terms</a></li>
        @include('components.terms')
        <li class="nav-item"><a href="{{ route('home') }}#about-us-page" class="nav-link px-2 text-white hover-underline">About Us</a></li>
    </ul>
    <hr class="mx-4 my-0" style="border-top: 2px solid white">
    <p class="text-center my-2 text-white">&copy; GenderVoices 2024</p>
  </footer>
</div>
