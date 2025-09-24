<div>
    {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}
<header>
  <!-- Desktop Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-transparent fixed-top d-none d-lg-flex">
    <div class="container">
      <a class="navbar-brand fw-bold" href="/">TravelConnect</a>

      <ul class="navbar-nav mx-auto">
        <li class="nav-item"><a class="nav-link active" href="/destinations">Destinations</a></li>
        <li class="nav-item"><a class="nav-link" href="/tours">Tours</a></li>
        <li class="nav-item"><a class="nav-link" href="/about">About</a></li>
        <li class="nav-item"><a class="nav-link" href="/blog">Blog</a></li>
        <li class="nav-item"><a class="nav-link" href="/contact">Contact</a></li>
      </ul>

      <div class="d-flex">
         @auth
    @if (auth()->user()->hasRole('super_admin'))
        <a href="{{ url('/admin') }}" class="btn btn-outline-light me-2">Dashboard</a>
    @else
        <a href="{{ url('/user') }}" class="btn btn-outline-light me-2">Dashboard</a>
    @endif
@endauth
        @guest
          <a href="/user" class="btn btn-outline-light ">Sign In</a>
        @endguest
      </div>
    </div>
  </nav>

  <!-- Mobile Navbar -->
  <nav class="navbar navbar-light bg-light fixed-top d-lg-none" >
    <div class="container-fluid">
      <a class="navbar-brand fw-bold" href="/">TravelConnect Expeditions</a>
      <!-- Toggler (unique target ID) -->
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mobileMenu"
        aria-controls="mobileMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <!-- Collapsible menu -->
      <div class="collapse navbar-collapse mt-2" id="mobileMenu">
        <ul class="navbar-nav">
          <li class="nav-item"><a class="nav-link active" href="/destinations">Destinations</a></li>
          <li class="nav-item"><a class="nav-link" href="/tours">Tours</a></li>
          <li class="nav-item"><a class="nav-link" href="/about">About</a></li>
          <li class="nav-item"><a class="nav-link" href="/blog">Blog</a></li>
          <li class="nav-item"><a class="nav-link" href="/contact">Contact</a></li>
        </ul>

        <div class="d-flex mt-3">
        @auth
    @if (auth()->user()->hasRole('super_admin'))
        <a href="{{ url('/admin') }}" class="btn btn-outline-dark text-black me-2">Dashboard</a>
    @else
        <a href="{{ url('/user') }}" class="btn btn-outline-dark text-black me-2">Dashboard</a>
    @endif
@endauth

          @guest
            <a href="/user" class="btn btn-outline-dark text-black">Sign In</a>
          @endguest
        </div>
      </div>
    </div>
  </nav>
</header>



</div>
