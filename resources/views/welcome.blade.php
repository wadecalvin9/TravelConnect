<x-main>
    <!-- Hero Section -->
    <section class="hero d-flex align-items-center justify-content-center text-center text-white"
        style="background: linear-gradient(rgba(0,0,0,0.55), rgba(0,0,0,0.55)), url('{{ $settings->hero_image }}') center/cover no-repeat;
               width:100%; height:100vh; position:relative;">
        <div class="container position-relative z-2">
            <h1 class="display-3 fw-bold mb-3">{{ $settings->hero_title }}</h1>
            <p class="lead text-light mb-4">{{ $settings->hero_description }}</p>
            <a href="/tours" class="btn btn-light btn-lg rounded-pill shadow-sm px-4 py-2 hover-elevate">
                Book Tour Now
            </a>
        </div>
    </section>

    <!-- Popular Destinations -->
    <section class="py-5 bg-light">
        <div class="container">
            <h2 class="text-center mb-5 fw-bold">Top Destinations</h2>

            <div id="destinationsCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner rounded-4 shadow-lg overflow-hidden">
                    @foreach ($destinations as $key => $destination)
                        <div class="carousel-item {{ $key === 0 ? 'active' : '' }}">
                            <div class="position-relative" style="height: 500px; background: url('{{ $destination->image}}') center/cover no-repeat;">
                                <div class="position-absolute top-0 start-0 w-100 h-100 bg-dark bg-opacity-50 d-flex flex-column justify-content-center align-items-center text-white px-4">
                                    <h3 class="display-5 fw-bold">{{ $destination->name }}</h3>
                                    <p class="lead mb-4 text-center" style="max-width: 700px;">
                                        {{ Str::limit($destination->description, 150) }}
                                    </p>
                                    <a href="" class="btn btn-light btn-lg rounded-pill shadow-sm">
                                        Explore Now
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Carousel Controls -->
                <button class="carousel-control-prev" type="button" data-bs-target="#destinationsCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon bg-dark rounded-circle p-2"></span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#destinationsCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon bg-dark rounded-circle p-2"></span>
                </button>
            </div>
        </div>
    </section>

    <!-- Popular Tours -->
    <section class="py-5 bg-light">
        <div class="container">
            <h2 class="fw-bold text-center mb-3">Popular Tours</h2>
            <p class="text-muted text-center mb-5">Carefully curated tours with amazing experiences</p>

            <div class="scrollable-wrapper">
                @foreach ($tours as $tour)
                    @if ($tour->popular)
                        <div class="card shadow-sm rounded-4 tour-card hover-elevate">
                            <img src="{{ $tour->image }}" class="card-img-top rounded-top-4 card-img-fixed"
                                alt="{{ $tour->name }}">
                            <div class="card-body text-center">
                                <h5 class="fw-bold">{{ $tour->name }}</h5>
                                <p class="text-muted">{{ \Illuminate\Support\Str::limit($tour->description, 80) }}</p>
                                <a href="{{ route('tours.show', $tour->id) }}"
                                    class="btn btn-primary btn-sm rounded-pill mt-2">Book Now</a>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </section>

    <!-- Special Packages -->
    <section class="py-5">
        <div class="container">
            <h2 class="fw-bold text-center mb-3">Special Packages</h2>
            <p class="text-muted text-center mb-5">Exclusive offers designed for your perfect journey</p>

            <div class="scrollable-wrapper">
                @foreach ($tours as $tour)
                    @if ($tour->special)
                        <div class="card shadow-sm rounded-4 package-card hover-elevate">
                            <img src="{{ $tour->image }}" class="card-img-top rounded-top-4 card-img-fixed"
                                alt="{{ $tour->name }}">
                            <div class="card-body text-center">
                                <h5 class="fw-bold">{{ $tour->name }}</h5>
                                <p class="text-muted">{{ \Illuminate\Support\Str::limit($tour->description, 80) }}</p>
                                <h6 class="fw-bold text-primary">{{ $tour->price }} <small
                                        class="text-muted">/person</small></h6>
                                <a href="{{ route('tours.show', $tour->id) }}"
                                    class="btn btn-primary btn-sm rounded-pill mt-2 w-100">Book Now</a>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </section>

    <!-- Video Section -->
    <section class="py-5 bg-light">
        <div class="container text-center">
            <h2 class="fw-bold mb-4">Experience the Journey</h2>
            <div class="ratio ratio-16x9 rounded-4 shadow-sm overflow-hidden mx-auto" style="max-width: 900px;">
                <iframe src="https://www.youtube.com/embed/sPb_rA1bIUk?rel=0&mute=1"
                    title="YouTube video player" frameborder="0" allow="autoplay; encrypted-media"
                    allowfullscreen></iframe>
            </div>
        </div>
    </section>

    <!-- Testimonials -->
    <section class="py-5">
        <div class="container text-center">
            <h2 class="fw-bold mb-3">What Our Clients Say</h2>
            <p class="text-muted mb-5">Real experiences from happy travelers</p>

            <div id="testimonialCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    @foreach ($reviews as $index => $review)
                        <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                            <div class="card border-0 shadow-sm rounded-4 mx-auto p-4" style="max-width: 600px;">
                                <p class="fst-italic">“{{ $review->comment }}”</p>
                                <div class="d-flex align-items-center justify-content-center mt-3">
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

                <!-- Controls -->
                <button class="carousel-control-prev" type="button" data-bs-target="#testimonialCarousel"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon bg-dark rounded-circle p-2"></span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#testimonialCarousel"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon bg-dark rounded-circle p-2"></span>
                </button>
            </div>
        </div>
    </section>

    <!-- Motto & Achievements -->
    <section class="py-5 bg-light">
        <div class="container text-center">
            <h2 class="fw-bold mb-3">“Travel. Explore. Discover.”</h2>
            <p class="text-muted mb-5">We create unforgettable experiences for every traveler.</p>

            <div class="row g-4">
                <div class="col-6 col-md-3">
                    <div class="stat-card">
                        <h3 class="fw-bold text-primary">10K+</h3>
                        <p class="text-muted mb-0">Happy Travelers</p>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="stat-card">
                        <h3 class="fw-bold text-primary">50+</h3>
                        <p class="text-muted mb-0">Destinations</p>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="stat-card">
                        <h3 class="fw-bold text-primary">500+</h3>
                        <p class="text-muted mb-0">Tours Completed</p>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="stat-card">
                        <h3 class="fw-bold text-primary">98%</h3>
                        <p class="text-muted mb-0">Client Satisfaction</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Minimalistic Google-Style CSS with Glassmorphism -->
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: aliceblue;
        }

        .fixed-img {
            height: 260px;
            object-fit: cover;
        }

        .scrollable-wrapper {
            display: flex;
            gap: 1rem;
            overflow-x: auto;
            padding-bottom: 1rem;
            scroll-behavior: smooth;
        }

        .tour-card,
        .package-card {
            min-width: 260px;
            max-width: 280px;
            flex: 0 0 auto;
            border: none;
            overflow: hidden;
            position: relative;
            background: transparent;
        }

        /* Glassmorphism effect for card body */
        .tour-card .card-body,
        .package-card .card-body {
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border-radius: 1rem;
            padding: 1rem;
            margin-top: -5px;
            transition: all 0.3s ease;
        }

        .tour-card .card-body:hover,
        .package-card .card-body:hover {
            background: rgba(255, 255, 255, 0.25);
        }

        .tour-card img,
        .package-card img {
            height: 180px;
            object-fit: cover;
            border-top-left-radius: 1rem;
            border-top-right-radius: 1rem;
        }

        .hover-elevate {
            transition: all 0.3s ease;
        }

        .hover-elevate:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15) !important;
        }

        .stat-card {
            background: #fff;
            border-radius: 1rem;
            padding: 1.5rem;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.08);
        }
    </style>
</x-main>
