<x-main>
    <title>Tours</title>
    <livewire:header2/>

    <!-- Hero Section -->
    <section class="destinations hero d-flex align-items-center justify-content-center text-center text-white"
             style="background-image: url('https://images.pexels.com/photos/462162/pexels-photo-462162.jpeg');
                    background-size: cover;
                    background-position: center;
                    height: 60vh;
                    position: relative;">
        <div class="overlay" style="position:absolute; top:0; left:0; width:100%; height:100%; background: rgba(0,0,0,0.4);"></div>
        <div class="position-relative">
            <h1 class="display-4 fw-bold animate__animated animate__fadeInDown">Explore Destinations</h1>
            <p class="lead animate__animated animate__fadeInUp animate__delay-1s">Find your next adventure with us</p>
        </div>
    </section>

    <!-- Destinations Section -->
    <section class="py-5 bg-light" id="destinations">
        <div class="container">

            <!-- Section Title -->
            <div class="text-center mb-5">
                <h2 class="mb-3 fw-bold text-primary">Popular Destinations</h2>
                <p class="text-muted">Explore the most loved destinations by our travelers</p>
            </div>

            <!-- Destinations Grid -->
            <div id="destinationsGrid" class="row g-4">
                @foreach ($destinations as $destination)
                    <div class="col-md-4 destination" data-country="france" data-price="luxury" data-duration="1week">
                        <div class="card glass-card shadow-lg h-100 border-0 hover-zoom">
                            <img src="{{ $destination->image }}"
                                 class="card-img-top"
                                 alt="{{ $destination->name }}"
                                 style="height:250px; object-fit:cover;">
                            <div class="card-body text-center">
                                <h5 class="card-title fw-bold">{{ $destination->name }}</h5>
                                <p class="card-text text-muted">{{ $destination->description }}</p>
                            </div>
                            <div class="card-footer bg-transparent border-0">
                                <a href="{{ route('destinations.show', $destination->id) }}" class="btn btn-primary w-100 rounded-pill shadow-sm">Explore</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </section>

    <style>
        /* Glass card effect */
        .glass-card {
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            border: 1px solid rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        /* Hover zoom */
        .hover-zoom:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(0,0,0,0.2);
        }

        /* Hero overlay text */
        .hero .overlay {
            z-index: 1;
        }
        .hero>.position-relative {
            z-index: 2;
        }

        /* Card titles and text */
        .card-title {
            letter-spacing: 0.5px;
        }

        .card-text {
            font-size: 0.95rem;
        }

        /* Buttons */
        .btn-primary {
            background: linear-gradient(135deg, #0062E6, #33AEFF);
            border: none;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 12px rgba(0,0,0,0.2);
        }
    </style>
</x-main>
