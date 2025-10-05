<x-main>
    <title>Tours</title>

    <!-- Floating Session Success Alert -->
    @if (session('success'))
        <div class="position-fixed top-0 start-50 translate-middle-x mt-3"
             style="min-width: 320px; z-index: 2000;">
            <div class="alert alert-success alert-dismissible fade show shadow-lg" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    @endif

    <!-- Hero Section -->
    <section class="hero d-flex align-items-center justify-content-center text-center"
        style="background: linear-gradient(rgba(0,0,0,0.45), rgba(0,0,0,0.45)), url('https://images.pexels.com/photos/33045/lion-wild-africa-african.jpg') center/cover no-repeat; height: 50vh;">
        <div class="text-white">
            <h1 class="display-4 fw-bold">Discover Our Premium Tours</h1>
            <p class="lead">Handpicked experiences for the discerning traveler</p>
        </div>
    </section>

    <!-- Tours Section -->
    <section class="py-5 bg-light" id="tours">
        <div class="container">

            <!-- Filter -->
            <form id="filterForm" class="row mb-5 g-3 justify-content-center align-items-center">
                <div class="col-md-4">
                    <select id="destinationFilter" class="form-select shadow-sm">
                        <option value="">Choose Destination</option>
                        @foreach ($destinations as $destination)
                            <option value="{{ $destination->id }}">{{ $destination->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4 d-flex gap-2">
                    <button type="submit" class="btn btn-gradient-primary flex-fill">Filter</button>
                    <button type="button" id="resetBtn" class="btn btn-outline-secondary flex-fill">Reset</button>
                </div>
            </form>

            <!-- Section title -->
            <div class="text-center mb-5">
                <h2 class="mb-3 fw-bold">Popular Tours</h2>
                <p class="text-muted fs-5">Explore the most loved tours by our travelers</p>
            </div>

            <!-- Tours Grid -->
            <div id="toursGrid" class="row g-4">
                @foreach ($tours as $tour)
                    <div class="col-md-4 tour-card" data-destination="{{ $tour->destination_id }}">
                        <div class="card tour-glass shadow-lg h-100 border-0 overflow-hidden">
                            <div class="position-relative">
                                <img src="{{ $tour->image }}" class="card-img-top" alt="{{ $tour->name }}"
                                    style="height: 250px; object-fit: cover;">
                                <div class="tour-price-badge">
                                    <span class="fw-bold bg-primary text-white px-3 py-1 rounded-pill shadow-sm">KSH {{ $tour->price ?? 'N/A' }}</span>
                                </div>
                            </div>
                            <div class="card-body text-center">
                                <h5 class="card-title fw-bold">{{ $tour->name }}</h5>
                                <p class="card-text text-muted">{{ substr($tour->description, 0, 100) }}...</p>
                                <a href="{{ route('tours.show', $tour->id) }}" class="btn btn-gradient-primary w-100 mt-3">Explore</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- JavaScript Filter + Reset -->
    <script>
        const filterForm = document.getElementById('filterForm');
        const resetBtn = document.getElementById('resetBtn');
        const tourCards = document.querySelectorAll('.tour-card');

        filterForm.addEventListener('submit', function(e) {
            e.preventDefault();
            const selectedDestination = document.getElementById('destinationFilter').value;

            tourCards.forEach(card => {
                card.style.display = !selectedDestination || card.dataset.destination === selectedDestination ? 'block' : 'none';
            });
        });

        resetBtn.addEventListener('click', function() {
            document.getElementById('destinationFilter').value = "";
            tourCards.forEach(card => {
                card.style.display = 'block';
            });
        });
    </script>

    <!-- Premium CSS -->
    <style>
        body {
            font-family: 'Roboto', sans-serif;
        }

        /* Gradient Buttons */
        .btn-gradient-primary {
            background: linear-gradient(135deg, #6a11cb, #2575fc);
            color: #fff;
            border: none;
            transition: all 0.3s ease;
        }
        .btn-gradient-primary:hover {
            background: linear-gradient(135deg, #2575fc, #6a11cb);
            color: #fff;
        }

        /* Glassmorphism Tour Cards */
        .tour-glass {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border-radius: 1rem;
            transition: all 0.3s ease;
        }
        .tour-glass:hover {
            transform: translateY(-8px);
            box-shadow: 0 12px 28px rgba(0,0,0,0.25);
            background: rgba(255, 255, 255, 0.15);
        }

        .tour-price-badge {
            position: absolute;
            top: 15px;
            right: 15px;
        }

        /* Card Images */
        .tour-glass img {
            border-top-left-radius: 1rem;
            border-top-right-radius: 1rem;
            transition: transform 0.3s ease;
        }
        .tour-glass:hover img {
            transform: scale(1.05);
        }

        /* Filter Form Styling */
        #destinationFilter {
            border-radius: 50px;
            padding: 0.5rem 1rem;
        }

        section.hero h1 {
            font-weight: 700;
            font-size: 2.8rem;
        }

        section.hero p {
            font-size: 1.2rem;
        }

        .card-title {
            font-size: 1.2rem;
        }
        .card-text {
            font-size: 0.95rem;
        }
    </style>
</x-main>
