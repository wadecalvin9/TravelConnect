<x-main>
    <livewire:header />
    <livewire:hero />
    <!-- Popular Destinations Carousel -->
    <section class="py-5">
        <div class="container">
            <h1 class="mb-3 text-center fw-bold">Popular Destinations</h1>
            <p class="mb-5 text-center text-muted">Explore our top destinations from our clients reviews</p>
            <div id="destinationsCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    @foreach ($destinations as $index => $destination)
                        <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                            <div class="card border-0 shadow-lg rounded-3 overflow-hidden glass-card">
                                <img src="{{ $destination->image }}" class="card-img fixed-img"
                                    alt="{{ $destination->name }}">
                                <div
                                    class="card-img-overlay d-flex flex-column justify-content-end p-4 overlay-gradient">
                                    <h3 class="card-title fw-bold">{{ $destination->name }}</h3>
                                    <p class="card-text">{{ $destination->description }}</p>
                                    <a href="#" class="btn btn-light btn-lg rounded-pill mt-2 w-50">Explore</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#destinationsCarousel"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#destinationsCarousel"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </button>
            </div>
        </div>
    </section>

    <!-- Popular Tours -->
    <section class="py-5">
        <div class="container">
            <h2 class="mb-3 text-center">Popular Tours</h2>
            <p class="text-muted text-center mb-4">Explore our top tours from our clients reviews</p>

            <div class="scrollable-wrapper">
                @foreach ($tours as $tour)
                    @if ($tour->popular)
                        <div class="card glass-card tour-card">
                            <img src="{{ $tour->image }}" class="card-img-top card-img-fixed"
                                alt="{{ $tour->name }}">
                            <div class="card-body text-center d-flex flex-column">
                                <h5 class="card-title">{{ $tour->name }}</h5>
                                <p class="card-text flex-grow-1">
                                    {{ \Illuminate\Support\Str::limit($tour->description, 100) }}</p>
                                <a href="{{ route('tours.show', $tour->id) }}"
                                    class="btn btn-sm btn-primary mt-auto">Book Now</a>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </section>

    <!-- Special Packages -->
    <section class="py-5 bg-light">
        <div class="container text-center">
            <h2 class="mb-3">Special Packages</h2>
            <p class="text-muted mb-5">Exclusive offers curated just for you</p>

            <div class="scrollable-wrapper">
                @foreach ($tours as $tour)
                    @if ($tour->special)
                        <div class="card glass-card package-card">
                            <img src="{{ $tour->image }}" class="card-img-top card-img-fixed"
                                alt="{{ $tour->name }}">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title">{{ $tour->name }}</h5>
                                <p class="card-text flex-grow-1">
                                    {{ \Illuminate\Support\Str::limit($tour->description, 100) }}</p>
                                <h6 class="fw-bold text-primary mt-auto">
                                    {{ $tour->price }} <small class="text-muted">/person</small>
                                </h6>
                            </div>
                            <div class="card-footer bg-transparent border-0">
                                <a href="{{ route('tours.show', $tour->id) }}" class="btn btn-primary w-100">Book
                                    Now</a>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </section>

    <!-- Video Section -->
    <section class="py-5">
        <div class="container text-center">
            <h2 class="mb-4">Experience the Journey</h2>
            <div class="ratio ratio-16x9 shadow-lg rounded overflow-hidden mx-auto" style="max-width: 900px;">
                <iframe src="https://www.youtube.com/embed/sPb_rA1bIUk?rel=0&mute=1" title="YouTube video player"
                    frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                    allowfullscreen>
                </iframe>
            </div>
        </div>
    </section>

    <!-- Testimonials -->
    <section class="py-5 bg-light">
    <div class="container text-center">
        <h2 class="mb-3">What Our Clients Say</h2>
        <p class="text-muted mb-5">Real experiences from happy travelers</p>

        <div id="testimonialCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                @foreach ($reviews as $index => $review)
                    <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                        <div class="card glass-card border-0 shadow-sm mx-auto" style="max-width: 600px;">
                            <div class="card-body">
                                <p class="card-text fst-italic">"{{ $review->comment }}"</p>
                                <div class="d-flex align-items-center justify-content-center mt-4">
                                    <img src="https://cdn-icons-png.flaticon.com/128/149/149071.png"
                                         class="rounded-circle me-3" alt="Client" width="60" height="60">
                                    <div class="text-start">
                                        <h6 class="mb-0 fw-bold">{{ $review->name }}</h6>
                                        <small class="text-muted">{{ $review->country }}</small>
                                    </div>
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
            <h2 class="fw-bold mb-3">"Travel. Explore. Discover."</h2>
            <p class="text-muted mb-5">We create unforgettable experiences for every traveler.</p>

            <div class="row g-4 justify-content-center">
                <div class="col-6 col-md-3">
                    <div class="card glass-card border-0 shadow-sm h-100">
                        <div class="card-body">
                            <h3 class="fw-bold text-primary">10K+</h3>
                            <p class="mb-0 text-muted">Happy Travelers</p>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="card glass-card border-0 shadow-sm h-100">
                        <div class="card-body">
                            <h3 class="fw-bold text-primary">50+</h3>
                            <p class="mb-0 text-muted">Destinations Worldwide</p>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="card glass-card border-0 shadow-sm h-100">
                        <div class="card-body">
                            <h3 class="fw-bold text-primary">500+</h3>
                            <p class="mb-0 text-muted">Tours Completed</p>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="card glass-card border-0 shadow-sm h-100">
                        <div class="card-body">
                            <h3 class="fw-bold text-primary">98%</h3>
                            <p class="mb-0 text-muted">Client Satisfaction</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Styles -->
    <style>
        .glass-card {
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(10px);
            border-radius: 1rem;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .glass-card:hover {
            transform: scale(1.03);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
        }

        .fixed-img {
            height: 450px;
            object-fit: cover;
        }

        .overlay-gradient {
            background: linear-gradient(to top, rgba(0, 0, 0, 0.6), transparent);
            color: #fff;
        }

        .scrollable-wrapper {
            display: flex;
            overflow-x: auto;
            gap: 1rem;
            padding-bottom: 1rem;
            scroll-behavior: smooth;
        }

        .tour-card,
        .package-card {
            min-width: 260px;
            max-width: 280px;
            flex: 0 0 auto;
        }

        .card-img-fixed {
            height: 180px;
            object-fit: cover;
        }
    </style>
</x-main>
