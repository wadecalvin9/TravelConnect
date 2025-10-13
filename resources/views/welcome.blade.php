<x-main>
    <title>{{ $settings->site_title ?? 'Home' }}</title>

    <!-- Hero Section -->
    <section class="hero d-flex align-items-center justify-content-center text-center text-white position-relative overflow-hidden"
        style="background: linear-gradient(rgba(0,0,0,0.55), rgba(0,0,0,0.55)),
                url('{{ $settings->hero_image }}') center/cover no-repeat;
                height: 100vh; min-height: 550px; max-height: 850px;">
        <div class="container position-relative z-2 px-3">
            <h1 class="display-3 fw-bold mb-3 animate-fade" style="font-size: clamp(2rem, 6vw, 4rem); letter-spacing: 1px;">
                {{ $settings->hero_title }}
            </h1>
            <p class="lead mb-4 text-light animate-fade" style="font-size: clamp(1rem, 2.8vw, 1.4rem); max-width: 700px; margin: 0 auto;">
                {{ $settings->hero_description }}
            </p>
            <a href="/tours" class="btn btn-glass btn-lg rounded-pill hover-elevate mt-3 px-4 py-2">
                <i class="bi bi-airplane-engines me-2"></i>Book Tour Now
            </a>
        </div>
        <div class="hero-overlay"></div>
    </section>

    <!-- Top Destinations Carousel -->
    <section class="py-5 bg-light">
        <div class="container">
            <h2 class="section-title text-center mb-5">Top Destinations</h2>
            <div id="destinationsCarousel" class="carousel slide shadow-lg rounded-4 overflow-hidden" data-bs-ride="carousel">
                <div class="carousel-inner">
                    @foreach ($destinations as $key => $destination)
                        <div class="carousel-item {{ $key === 0 ? 'active' : '' }}">
                            <div class="destination-slide"
                                 style="background: url('{{ $destination->image }}') center/cover no-repeat;">
                                <div class="destination-overlay">
                                    <h3 class="fw-bold mb-2">{{ $destination->name }}</h3>
                                    <p class="text-center mb-3">{{ Str::limit($destination->description, 150) }}</p>
                                    <a href="{{ route('destinations.show', $destination->id) }}"
                                       class="btn btn-glass rounded-pill hover-elevate">Explore Now</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#destinationsCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon bg-dark rounded-circle p-2"></span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#destinationsCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon bg-dark rounded-circle p-2"></span>
                </button>
            </div>
        </div>
    </section>

    <!-- Destinations Grid -->
    <section class="py-5">
        <div class="container">
            <h2 class="section-title text-center mb-3">Explore our destinations</h2>
            <p class="text-center text-muted mb-5">Swipe through Kenya's amazing destinations</p>
            <div class="scrollable-wrapper">
                @foreach ($destinations as $destination)
                    <div class="card tour-card hover-elevate rounded-4 shadow-sm">
                        <div class="position-relative">
                            <img src="{{ $destination->image }}" class="card-img-top card-img-fixed rounded-top-4" alt="{{ $destination->name }}">
                            <span class="badge bg-primary position-absolute top-0 end-0 m-3 px-3 py-2 rounded-pill shadow-sm">featured</span>
                        </div>
                        <div class="card-body text-center d-flex flex-column justify-content-between">
                            <div>
                                <h5 class="fw-bold">{{ $destination->name }}</h5>
                                <p class="text-muted small">{{ Str::limit($destination->description, 80) }}</p>
                            </div>
                            <a href="{{ route('destinations.show', $destination->id) }}" class="btn btn-primary btn-sm rounded-pill mt-3 w-100">
                                Explore More
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Popular Hotels -->
    <section class="py-5">
        <div class="container">
            <h2 class="section-title text-center mb-3">Popular Hotels</h2>
            <p class="text-center text-muted mb-5">Curated adventures designed for unforgettable moments</p>
            <div class="scrollable-wrapper">
                @foreach ($tours as $tour)
                    @if ($tour->popular)
                        <div class="card tour-card hover-elevate rounded-4 shadow-sm">
                            <div class="position-relative">
                                <img src="{{ $tour->image }}" class="card-img-top card-img-fixed rounded-top-4" alt="{{ $tour->name }}">
                                <span class="badge bg-primary position-absolute top-0 end-0 m-3 px-3 py-2 rounded-pill shadow-sm">Popular</span>
                            </div>
                            <div class="card-body text-center d-flex flex-column justify-content-between">
                                <div>
                                    <h5 class="fw-bold">{{ $tour->name }}</h5>
                                    <p class="text-muted small">{{ Str::limit($tour->description, 80) }}</p>
                                    <h6 class="fw-bold text-primary mt-2">{{ $tour->price }} <small class="text-muted"></small></h6>
                                </div>
                                <a href="{{ route('tours.show', $tour->id) }}" class="btn btn-primary btn-sm rounded-pill mt-3 w-100">
                                    Explore
                                </a>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </section>

    <!-- Special Packages -->
    <section class="py-5 bg-light">
        <div class="container">
            <h2 class="section-title text-center mb-3">Special Packages</h2>
            <p class="text-center text-muted mb-5">Exclusive offers for dream vacations</p>
            <div class="scrollable-wrapper">
                @foreach ($tours as $tour)
                    @if ($tour->special)
                        <div class="card package-card hover-elevate rounded-4 shadow-sm">
                            <img src="{{ $tour->image }}" class="card-img-top card-img-fixed rounded-top-4" alt="{{ $tour->name }}">
                            <div class="card-body text-center d-flex flex-column justify-content-between">
                                <div>
                                    <h5 class="fw-bold">{{ $tour->name }}</h5>
                                    <p class="text-muted small">{{ Str::limit($tour->description, 80) }}</p>
                                    <h6 class="fw-bold text-primary mt-2">{{ $tour->price }} <small class="text-muted"></small></h6>
                                </div>
                                <a href="{{ route('tours.show', $tour->id) }}" class="btn btn-primary btn-sm rounded-pill mt-3 w-100">
                                    Book Now
                                </a>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </section>

    <!-- Experience Video -->
    <section class="py-5 bg-light">
        <div class="container text-center">
            <h2 class="section-title mb-4">Experience the Journey</h2>
            <div class="ratio ratio-16x9 rounded-4 shadow-lg overflow-hidden">
                <iframe src="{{ $settings->youtube }}" title="YouTube video player" allowfullscreen></iframe>
            </div>
        </div>
    </section>

    <!-- Testimonials -->
    <section class="py-5">
        <div class="container text-center">
            <h2 class="section-title mb-3">What Our Clients Say</h2>
            <p class="text-muted mb-5">Real stories from real explorers</p>
            <div id="testimonialCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    @foreach ($reviews as $index => $review)
                        <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                            <div class="card border-0 shadow-lg rounded-4 mx-auto p-4" style="max-width: 600px;">
                                <p class="fst-italic text-dark mb-4">“{{ $review->comment }}”</p>
                                <div class="d-flex align-items-center justify-content-center">
                                    <img src="https://cdn-icons-png.flaticon.com/128/1144/1144709.png"
                                         class="rounded-circle me-3 shadow-sm" width="60" height="60" alt="Client">
                                    <div class="text-start">
                                        <h6 class="fw-bold mb-0">{{ $review->name }}</h6>
                                        <small class="text-muted">From {{ $review->country }}</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon bg-dark rounded-circle p-2"></span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon bg-dark rounded-circle p-2"></span>
                </button>
            </div>
        </div>
    </section>

    <!-- Stats -->
    <section class="py-5 bg-light">
        <div class="container text-center">
            <h2 class="section-title mb-3">“Travel. Explore. Discover.”</h2>
            <p class="text-muted mb-5">Creating memorable journeys for every traveler</p>
            <div class="row g-4 justify-content-center">
                @foreach ([
                    ['10K+', 'Happy Travelers'],
                    ['50+', 'Destinations'],
                    ['500+', 'Tours Completed'],
                    ['98%', 'Client Satisfaction']
                ] as [$stat, $label])
                    <div class="col-6 col-md-3">
                        <div class="stat-card hover-elevate">
                            <h3 class="fw-bold text-primary">{{ $stat }}</h3>
                            <p class="text-muted mb-0">{{ $label }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Custom Styles -->
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f9fafd;
        }
        .section-title {
            font-weight: 700;
            color: #1a1a1a;
            letter-spacing: 0.5px;
            position: relative;
        }
        .section-title::after {
            content: "";
            display: block;
            width: 80px;
            height: 3px;
            background: linear-gradient(90deg, #007bff, #00bcd4);
            margin: 12px auto 0;
            border-radius: 2px;
        }
        .scrollable-wrapper {
            display: flex;
            gap: 1rem;
            overflow-x: auto;
            padding-bottom: 1rem;
            scroll-behavior: smooth;
        }
        .tour-card, .package-card {
            min-width: 260px;
            max-width: 280px;
            flex: 0 0 auto;
            background-color: #fff;
            border: none;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .tour-card img, .package-card img {
            height: 180px;
            object-fit: cover;
        }
        .card-body {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            height: 100%;
        }
        .btn-glass {
            background: rgba(0, 0, 0, 0.4);
            backdrop-filter: blur(8px);
            color: #fff;
            border: 1px solid rgba(255,255,255,0.2);
            transition: all 0.3s ease;
        }
        .btn-glass:hover {
            background: rgba(0, 0, 0, 0.6);
            transform: translateY(-3px);
            box-shadow: 0 6px 12px rgba(0,0,0,0.3);
        }
        .hover-elevate {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .hover-elevate:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.15);
        }
        .destination-slide {
            height: 480px;
            position: relative;
        }
        .destination-overlay {
            background: rgba(0,0,0,0.5);
            color: #fff;
            position: absolute;
            inset: 0;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 2rem;
        }
        .animate-fade {
            opacity: 0;
            animation: fadeInUp 1.3s ease forwards;
        }
        @keyframes fadeInUp {
            0% { transform: translateY(20px); opacity: 0; }
            100% { transform: translateY(0); opacity: 1; }
        }
        .stat-card {
            background: #fff;
            border-radius: 1rem;
            padding: 1.5rem;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
            transition: all 0.3s ease;
        }
        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 18px rgba(0,0,0,0.15);
        }
    </style>
</x-main>
