<x-main>
    <title>Hotels</title>

    <!-- Floating Session Success Alert -->
    @if (session('success'))
        <div class="position-fixed top-0 start-50 translate-middle-x mt-3" style="min-width: 320px; z-index: 2000;">
            <div class="alert alert-success alert-dismissible fade show shadow-lg border-0 rounded-3" role="alert">
                <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    @endif

    <!-- Hero Section -->
    <section class="hero d-flex align-items-center justify-content-center text-center position-relative overflow-hidden"
        style="background: linear-gradient(rgba(0,0,0,0.45), rgba(0,0,0,0.45)),
                url('https://images.pexels.com/photos/261102/pexels-photo-261102.jpeg?auto=compress&cs=tinysrgb&w=1600')
                center/cover no-repeat; height: 60vh;">
        <div class="text-white fade-in">
            <h1 class="display-4 fw-bold mb-3 text-shadow">Discover Our Premium Accommodations</h1>
            <p class="lead text-light opacity-75 fs-5">Handpicked stays and luxury retreats for the modern traveler</p>
        </div>

        <!-- Floating Navigation Icon -->
        <a href="{{ url('/') }}"
           class="btn btn-glass position-absolute top-0 start-0 m-3 d-flex align-items-center gap-2">
            <i class="bi bi-arrow-left-circle fs-4"></i> <span class="fw-semibold">Home</span>
        </a>
    </section>

    <!-- Hotels Section -->
    <section class="py-5 bg-light" id="tours">
        <div class="container">

            <!-- Filter -->
            <form id="filterForm" class="row mb-5 g-3 justify-content-center align-items-center">
                <div class="col-md-4">
                    <select id="destinationFilter" class="form-select shadow-sm border-0 rounded-pill px-4 py-2">
                        <option value="">Choose Destination</option>
                        @foreach ($destinations as $destination)
                            <option value="{{ $destination->id }}">{{ $destination->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4 d-flex gap-2">
                    <button type="submit" class="btn btn-gradient-primary flex-fill rounded-pill py-2 fw-semibold">Filter</button>
                    <button type="button" id="resetBtn" class="btn btn-outline-secondary flex-fill rounded-pill py-2">Reset</button>
                </div>
            </form>

            <!-- Section title -->
            <div class="text-center mb-5">
                <h2 class="fw-bold display-6 mb-2 text-gradient">Accommodations for You</h2>
                <p class="text-muted fs-5">Explore the most loved hotels and stays by our travelers</p>
            </div>

            <!-- Hotel Cards Grid -->
            <div id="toursGrid" class="row g-4">
                @foreach ($tours as $tour)
                    <div class="col-md-4 tour-card" data-destination="{{ $tour->destination_id }}">
                        <div class="card border-0 shadow-lg tour-glass h-100 overflow-hidden rounded-4">
                            <div class="position-relative overflow-hidden">
                                <img src="{{ $tour->image }}"
                                     class="card-img-top img-zoom rounded-top-4"
                                     alt="{{ $tour->name }}"
                                     style="height: 260px; object-fit: cover;">
                                <div class="tour-price-badge">
                                    <span class="fw-bold bg-gradient-primary text-white px-3 py-1 rounded-pill shadow-sm">
                                        {{ $tour->price ?? 'N/A' }}
                                    </span>
                                </div>
                            </div>
                            <div class="card-body text-center p-4">
                                <h5 class="fw-bold mb-2">{{ $tour->name }}</h5>
                                <p class="text-muted small mb-3">{{ Str::limit($tour->description, 100) }}</p>
                                <a href="{{ route('tours.show', $tour->id) }}" class="btn btn-gradient-primary w-100 rounded-pill py-2">
                                    Explore
                                </a>
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

        filterForm.addEventListener('submit', e => {
            e.preventDefault();
            const selected = document.getElementById('destinationFilter').value;
            tourCards.forEach(card => {
                card.style.display = !selected || card.dataset.destination === selected ? 'block' : 'none';
            });
        });

        resetBtn.addEventListener('click', () => {
            document.getElementById('destinationFilter').value = "";
            tourCards.forEach(card => card.style.display = 'block');
        });
    </script>

    <!-- Premium CSS -->
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }

        .fade-in {
            animation: fadeIn 1.5s ease-in-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(15px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* Gradient Buttons */
        .btn-gradient-primary {
            background: linear-gradient(135deg, #6a11cb, #2575fc);
            color: #fff !important;
            border: none;
            transition: all 0.3s ease;
            box-shadow: 0 4px 14px rgba(37, 117, 252, 0.4);
        }
        .btn-gradient-primary:hover {
            transform: translateY(-2px);
            background: linear-gradient(135deg, #2575fc, #6a11cb);
        }

        /* Back Navigation Button */
        .btn-glass {
            background: rgba(255,255,255,0.15);
            backdrop-filter: blur(10px);
            color: #fff;
            border-radius: 50px;
            padding: 0.5rem 1rem;
            transition: all 0.3s ease;
        }
        .btn-glass:hover {
            background: rgba(255,255,255,0.25);
        }

        /* Gradient Text */
        .text-gradient {
            background: linear-gradient(45deg, #6a11cb, #2575fc);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        /* Card Glass Effect */
        .tour-glass {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(16px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            transition: all 0.35s ease;
        }
        .tour-glass:hover {
            transform: translateY(-10px);
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.15);
        }

        /* Card Image Hover */
        .img-zoom {
            transition: transform 0.5s ease;
        }
        .tour-glass:hover .img-zoom {
            transform: scale(1.08);
        }

        /* Price Badge */
        .tour-price-badge {
            position: absolute;
            top: 15px;
            right: 15px;
        }

        .bg-gradient-primary {
            background: linear-gradient(135deg, #6a11cb, #2575fc);
        }

        /* Subtle Shadow Text */
        .text-shadow {
            text-shadow: 0 4px 10px rgba(0,0,0,0.4);
        }
    </style>
</x-main>
