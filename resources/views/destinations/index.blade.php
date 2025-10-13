<x-main>
    <title>Tours</title>

    <!-- Hero Section -->
    <section class="destinations hero d-flex align-items-center justify-content-center text-center text-white position-relative"
        style="background-image: url('https://images.pexels.com/photos/33997548/pexels-photo-33997548.jpeg');
               background-size: cover;
               background-position: center;
               height: 60vh;">
        <div class="overlay"></div>
        <div class="position-relative hero-text">
            <h1 class="display-4 fw-bold fade-in">Explore Destinations</h1>
            <p class="lead fade-in-delay">Find your next adventure with us</p>
        </div>
    </section>

    <!-- Destinations Section -->
    <section class="py-5 bg-light" id="destinations">
        <div class="container">

            <!-- Section Title -->
            <div class="text-center mb-5">
                <h2 class="mb-3 fw-bold text-dark">Popular Destinations</h2>
                <p class="text-muted fs-5">Explore the most loved destinations by our travelers</p>
            </div>

            <div id="destinationsGrid" class="row g-5">
                <!-- Bush Safaris -->
                <h2 class="text-center mb-4 fw-semibold text-secondary">Bush Safaris</h2>
                @foreach ($destinations as $destination)
                    @if ($destination->category == 'Bush Safari')
                        <div class="col-md-4">
                            <div class="card glass-card border-0 shadow-sm h-100 overflow-hidden hover-lift">
                                <div class="image-wrapper">
                                    <img src="{{ $destination->image }}"
                                         alt="{{ $destination->name }}"
                                         class="card-img-top rounded-top-4"
                                         style="height:250px; object-fit:cover;">
                                </div>
                                <div class="card-body text-center px-4 py-3">
                                    <h5 class="card-title fw-bold text-dark">{{ $destination->name }}</h5>
                                    <p class="card-text text-muted small">{{ Str::limit($destination->description, 100) }}</p>
                                </div>
                                <div class="card-footer bg-transparent border-0 px-4 pb-4">
                                    <a href="{{ route('destinations.show', $destination->id) }}"
                                       class="btn btn-soft-primary w-100 rounded-pill py-2 fw-semibold">Explore</a>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach

                <!-- Beach Safaris -->
                <h2 class="text-center mb-4 mt-5 fw-semibold text-secondary">Beach Safaris</h2>
                @foreach ($destinations as $destination)
                    @if ($destination->category == 'Beach Safari')
                        <div class="col-md-4">
                            <div class="card glass-card border-0 shadow-sm h-100 overflow-hidden hover-lift">
                                <div class="image-wrapper">
                                    <img src="{{ $destination->image }}"
                                         alt="{{ $destination->name }}"
                                         class="card-img-top rounded-top-4"
                                         style="height:250px; object-fit:cover;">
                                </div>
                                <div class="card-body text-center px-4 py-3">
                                    <h5 class="card-title fw-bold text-dark">{{ $destination->name }}</h5>
                                    <p class="card-text text-muted small">{{ Str::limit($destination->description, 100) }}</p>
                                </div>
                                <div class="card-footer bg-transparent border-0 px-4 pb-4">
                                    <a href="{{ route('destinations.show', $destination->id) }}"
                                       class="btn btn-soft-primary w-100 rounded-pill py-2 fw-semibold">Explore</a>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach

                <!-- Day Trips -->
                <h2 class="text-center mb-4 mt-5 fw-semibold text-secondary">Day Trips and Excursions</h2>
                @foreach ($destinations as $destination)
                    @if ($destination->category == 'Day trips and excursions')
                        <div class="col-md-4">
                            <div class="card glass-card border-0 shadow-sm h-100 overflow-hidden hover-lift">
                                <div class="image-wrapper">
                                    <img src="{{ $destination->image }}"
                                         alt="{{ $destination->name }}"
                                         class="card-img-top rounded-top-4"
                                         style="height:250px; object-fit:cover;">
                                </div>
                                <div class="card-body text-center px-4 py-3">
                                    <h5 class="card-title fw-bold text-dark">{{ $destination->name }}</h5>
                                    <p class="card-text text-muted small">{{ Str::limit($destination->description, 100) }}</p>
                                </div>
                                <div class="card-footer bg-transparent border-0 px-4 pb-4">
                                    <a href="{{ route('destinations.show', $destination->id) }}"
                                       class="btn btn-soft-primary w-100 rounded-pill py-2 fw-semibold">Explore</a>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </section>

    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }

        /* Hero Section */
        .hero .overlay {
            position: absolute;
            inset: 0;
            background: rgba(0, 0, 0, 0.45);
            z-index: 1;
        }
        .hero-text {
            z-index: 2;
        }
        .fade-in {
            animation: fadeIn 1s ease-in-out;
        }
        .fade-in-delay {
            animation: fadeIn 1.5s ease-in-out;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(15px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* Glass Card */
        .glass-card {
            background: rgba(255, 255, 255, 0.9);
            border-radius: 1rem;
            transition: all 0.3s ease;
        }

        /* Hover lift animation */
        .hover-lift:hover {
            transform: translateY(-8px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15);
        }

        /* Image subtle zoom */
        .image-wrapper img {
            transition: transform 0.5s ease;
        }
        .hover-lift:hover img {
            transform: scale(1.05);
        }

        /* Card Text */
        .card-title {
            font-size: 1.15rem;
        }
        .card-text {
            line-height: 1.5;
        }

        /* Softer button style */
        .btn-soft-primary {
            background: #0078d4;
            color: #fff;
            border: none;
            transition: all 0.3s ease;
        }
        .btn-soft-primary:hover {
            background: #005fa3;
            transform: translateY(-2px);
            box-shadow: 0 6px 16px rgba(0, 90, 160, 0.3);
        }

        /* Section Titles */
        h2.text-secondary {
            font-size: 1.8rem;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .hero {
                height: 50vh;
            }
            .display-4 {
                font-size: 2rem;
            }
        }
    </style>
</x-main>
