<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ $settings->site_name ?? 'TravelConnect' }}</title>

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    /* 🔹 Glass Navbar - dark by default */

    /* Light hamburger button for dark glass navbar */
  .navbar-toggler {
    border-color: rgba(255,255,255,0.7); /* optional: light border */
  }

  .navbar-toggler-icon {
    background-image: url("data:image/svg+xml;charset=UTF8,%3Csvg viewBox='0 0 30 30' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath stroke='rgba(255,255,255,0.9)' stroke-width='2' stroke-linecap='round' stroke-miterlimit='10' d='M4 7h22M4 15h22M4 23h22'/%3E%3C/svg%3E");
  }


    .glass-nav {
      background: rgba(0, 0, 0, 0.565);
      backdrop-filter: blur(15px) saturate(150%);
      -webkit-backdrop-filter: blur(15px) saturate(150%);
      border-bottom: 1px solid rgba(255, 255, 255, 0.15);
      transition: background 0.4s ease;
    }

    /* 🔹 Darker tint when scrolling */
    .glass-nav.scrolled {
      background: rgba(0, 0, 0, 0.65);
    }

    /* Brand */
    .glass-nav .navbar-brand {
      color: #fff !important;
      font-weight: 700;
      font-size: 1.25rem;
      letter-spacing: 0.5px;
    }

    /* Nav links */
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

    /* 🔹 Sliding underline element */
    .nav-underline {
      position: absolute;
      bottom: 0;
      left: 0;
      height: 2px;
      width: 0;
      background: #929393c7;
      transition: all 0.3s ease;
    }

    /* Buttons */
    .glass-nav .btn {
      transition: all 0.3s ease;
    }

    .glass-nav .btn:hover {
      transform: translateY(-2px);
      box-shadow: 0 4px 10px rgba(0,0,0,0.2);
    }

    /* Fix mobile navbar collapse for underline */
    @media (max-width: 991px) {
      #navLinks {
        position: relative;
      }
      .nav-underline {
        display: none; /* optional: hide underline on small screens */
      }
    }
  </style>
</head>
<body>
  <!-- ✅ Navbar -->
  <nav class="navbar navbar-expand-lg fixed-top glass-nav">
    <div class="container position-relative">
      <a class="navbar-brand" href="/">TravelConnect</a>

      <button class="navbar-toggler border-0 shadow-none text-cyan-50" type="button" data-bs-toggle="collapse"
        data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarNav">
        <!-- Centered items -->
        <ul class="navbar-nav mx-auto position-relative" id="navLinks">
          <li class="nav-item"><a class="nav-link {{ request()->is('destinations') ? 'active' : '' }}" href="/destinations">Destinations</a></li>
          <li class="nav-item"><a class="nav-link {{ request()->is('tours') ? 'active' : '' }}" href="/tours">Tours</a></li>
          <li class="nav-item"><a class="nav-link {{ request()->is('about') ? 'active' : '' }}" href="/about">About</a></li>
          <li class="nav-item"><a class="nav-link {{ request()->is('blog') ? 'active' : '' }}" href="/blog">Blog</a></li>
          <li class="nav-item"><a class="nav-link {{ request()->is('contact') ? 'active' : '' }}" href="/contact">Contact</a></li>
          <div class="nav-underline"></div>
        </ul>

        <!-- Right side buttons -->
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

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

  <!-- ✅ Scroll + Sliding Underline JS -->
  <script>
    // Scroll effect works on all pages including mobile
    window.addEventListener("scroll", function () {
      const nav = document.querySelector(".glass-nav");
      if (window.scrollY > 50) {
        nav.classList.add("scrolled");
      } else {
        nav.classList.remove("scrolled");
      }
    });

    // Sliding underline for desktop
    const navLinks = document.querySelectorAll("#navLinks .nav-link");
    const underline = document.querySelector(".nav-underline");
    const activeLink = document.querySelector("#navLinks .nav-link.active");

    function moveUnderline(element) {
      if (!element) return;
      const { offsetLeft, offsetWidth } = element;
      underline.style.left = offsetLeft + "px";
      underline.style.width = offsetWidth + "px";
    }

    // Hover effect (desktop only)
    navLinks.forEach(link => {
      link.addEventListener("mouseenter", (e) => moveUnderline(e.target));
    });

    // Reset to active when leaving nav
    document.querySelector("#navLinks").addEventListener("mouseleave", () => {
      moveUnderline(activeLink);
    });

    // Initialize underline on page load
    window.addEventListener("load", () => {
      moveUnderline(activeLink);
    });
  </script>
</body>
</html>
