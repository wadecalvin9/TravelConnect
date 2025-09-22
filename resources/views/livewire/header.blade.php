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
        <li class="nav-item"><a class="nav-link" href="#">About</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Blog</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Contact</a></li>
      </ul>

      <div class="d-flex">
        @auth
          <a href="/user" class="btn btn-outline-light me-2">Dashboard</a>
        @endauth
        @guest
          <a href="/user" class="btn btn-outline-light">Sign In</a>
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
          <li class="nav-item"><a class="nav-link" href="#">About</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Blog</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Contact</a></li>
        </ul>

        <div class="d-flex mt-3">
          @auth
            <a href="/user" class="btn btn-outline-light me-2">Dashboard</a>
          @endauth
          @guest
            <a href="/user" class="btn btn-outline-light">Sign In</a>
          @endguest
        </div>
      </div>
    </div>
  </nav>
</header>



</div>
