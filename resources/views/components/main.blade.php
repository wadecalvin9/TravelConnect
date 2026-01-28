<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ $settings->site_name ?? 'TravelConnect' }}</title>

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.13.0/gsap.min.js" integrity="sha512-NcZdtrT77bJr4STcmsGAESr06BYGE8woZdSdEgqnpyqac7sugNO+Tr4bGwGF3MsnEkGKhU2KL2xh6Ec+BqsaHA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  <!-- Bootstrap Icons for footer social -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

  <style>
    /* 🔹 Light hamburger button for dark glass navbar */
    .navbar-toggler {
      border-color: rgba(255,255,255,0.7);
    }
    .navbar-toggler-icon {
      background-image: url("data:image/svg+xml;charset=UTF8,%3Csvg viewBox='0 0 30 30' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath stroke='rgba(255,255,255,0.9)' stroke-width='2' stroke-linecap='round' stroke-miterlimit='10' d='M4 7h22M4 15h22M4 23h22'/%3E%3C/svg%3E");
    }

    /* 🔹 Glass Navbar */
    .glass-nav {
      background: rgba(0, 0, 0, 0.565);
      backdrop-filter: blur(15px) saturate(150%);
      -webkit-backdrop-filter: blur(15px) saturate(150%);
      border-bottom: 1px solid rgba(255, 255, 255, 0.15);
      transition: background 0.4s ease;
    }
    .glass-nav.scrolled {
      background: rgba(0, 0, 0, 0.65);
    }
    .glass-nav .navbar-brand {
      color: #fff !important;
      font-weight: 700;
      font-size: 1.25rem;
      letter-spacing: 0.5px;
    }
    .glass-nav .nav-link {
      color: #ffffffcc !important;
      font-weight: 500;
      position: relative;
      padding: 0.5rem 1rem;
      transition: color 0.3s ease;
    }
    .glass-nav .nav-link:hover,
    .glass-nav .nav-link.active {
      color: #0d51f0 !important;
    }
    .nav-underline {
      position: absolute;
      bottom: 0;
      left: 0;
      height: 2px;
      width: 0;
      background: #929393c7;
      transition: all 0.3s ease;
    }
    .glass-nav .btn {
      transition: all 0.3s ease;
    }
    .glass-nav .btn:hover {
      transform: translateY(-2px);
      box-shadow: 0 4px 10px rgba(0,0,0,0.2);
    }
    @media (max-width: 991px) {
      #navLinks { position: relative; }
      .nav-underline { display: none; }
    }

    /* 🔹 Footer */
    footer {
      background: rgba(0,0,0,0.85);
      color: #e0e0e0;
      padding: 3rem 1rem;
      font-size: 0.9rem;
    }
    footer h5, footer h6 {
      color: #fff;
    }
    footer p, footer a, footer li {
      color: #ccc;
    }
    footer a:hover {
      color: #0dcaf0;
      text-decoration: underline;
    }
  </style>
</head>
<body>
  <!-- ✅ Navbar -->
  <nav class="navbar navbar-expand-lg fixed-top glass-nav">
    <div class="container position-relative">
      <a class="navbar-brand" href="/">TravelConnect</a>
      <button class="navbar-toggler border-0 shadow-none" type="button" data-bs-toggle="collapse"
        data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav mx-auto position-relative" id="navLinks">
         <li class="nav-item"><a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="/">Home</a></li>
          <li class="nav-item"><a class="nav-link {{ request()->is('destinations') ? 'active' : '' }}" href="/destinations">Destinations</a></li>
          <li class="nav-item"><a class="nav-link {{ request()->is('tours') ? 'active' : '' }}" href="/tours">Hotels</a></li>
          <li class="nav-item"><a class="nav-link {{ request()->is('currency-converter') ? 'active' : '' }}" href="/currency-converter">Currency Converter</a></li>
          <li class="nav-item"><a class="nav-link {{ request()->is('about') ? 'active' : '' }}" href="/about">About</a></li>
          <li class="nav-item"><a class="nav-link {{ request()->is('contact') ? 'active' : '' }}" href="/contact">Contact</a></li>
          <div class="nav-underline"></div>
        </ul>
        <div class="d-flex">
          @auth
            @if (auth()->user()->hasRole('super_admin'))
              <a href="{{ url('/admin') }}" class="btn btn-light me-2 rounded-pill">Dashboard</a>
            @else
              <a href="{{ url('/user') }}" class="btn btn-light me-2 rounded-pill">Dashboard</a>
            @endif
          @endauth
          @guest
            <a href="/user" class="btn btn-outline-light rounded-pill">Sign In</a>
          @endguest
        </div>
      </div>
    </div>
  </nav>

  <!-- ✅ Page Content -->
  <main>
    {{ $slot ?? '' }}
  </main>

  <!-- ✅ Premium Footer -->
  <footer>
    <div class="container">
      <div class="row">
        <!-- About -->
        <div class="col-md-4 mb-3">
          <h5 class="fw-bold">About {{ $settings->site_name ?? 'TravelConnect' }}</h5>
          <p>Explore amazing destinations and tours with us. Your adventure starts here!</p>
        </div>
        <!-- Quick Links -->
        <div class="col-md-2 mb-3">
          <h6 class="fw-bold">Quick Links</h6>
          <ul class="list-unstyled">
            <li><a href="/destinations" class="text-decoration-none">Destinations</a></li>
            <li><a href="/tours" class="text-decoration-none">Tours</a></li>
            <li><a href="/currency-converter" class="text-decoration-none">Currency Converter</a></li>
            <li><a href="/about" class="text-decoration-none">About</a></li>
            <li><a href="/contact" class="text-decoration-none">Contact</a></li>
          </ul>
        </div>
        <!-- Resources -->
        <div class="col-md-2 mb-3">
          <h6 class="fw-bold">Resources</h6>
          <ul class="list-unstyled">
            <li><a href="/blog" class="text-decoration-none">Blog</a></li>
            <li><a href="/privacy" class="text-decoration-none">Privacy Policy</a></li>
            <li><a href="/terms" class="text-decoration-none">Terms of Service</a></li>
          </ul>
        </div>
        <!-- Social -->
        <div class="col-md-4 mb-3">
          <h6 class="fw-bold">Follow Us</h6>
          <a href="#" class="text-light me-3 fs-5"><i class="bi bi-facebook"></i></a>
          <a href="#" class="text-light me-3 fs-5"><i class="bi bi-twitter"></i></a>
          <a href="#" class="text-light me-3 fs-5"><i class="bi bi-instagram"></i></a>
          <a href="#" class="text-light fs-5"><i class="bi bi-youtube"></i></a>
          <p class="mt-3">&copy; {{ date('Y') }} {{ $settings->site_name ?? 'TravelConnect' }}. All rights reserved.</p>
        </div>
      </div>
    </div>
  </footer>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

  <!-- ✅ Scroll + Sliding Underline JS -->
  <script>
    window.addEventListener("scroll", function () {
      const nav = document.querySelector(".glass-nav");
      if (window.scrollY > 50) nav.classList.add("scrolled");
      else nav.classList.remove("scrolled");
    });

    const navLinks = document.querySelectorAll("#navLinks .nav-link");
    const underline = document.querySelector(".nav-underline");
    const activeLink = document.querySelector("#navLinks .nav-link.active");

    function moveUnderline(element) {
      if (!element) return;
      const { offsetLeft, offsetWidth } = element;
      underline.style.left = offsetLeft + "px";
      underline.style.width = offsetWidth + "px";
    }

    navLinks.forEach(link => {
      link.addEventListener("mouseenter", e => moveUnderline(e.target));
    });

    document.querySelector("#navLinks").addEventListener("mouseleave", () => {
      moveUnderline(activeLink);
    });

    window.addEventListener("load", () => moveUnderline(activeLink));
  </script>


</body>
</html>
