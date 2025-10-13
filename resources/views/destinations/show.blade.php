<x-main>
    <title>{{ $destination->name }}</title>

    <!-- Hero Section -->
    <section class="destination-hero text-white text-center d-flex align-items-center justify-content-center"
        style="background-image: url('{{ $destination->image }}');">
        <div class="overlay"></div>
        <div class="hero-content position-relative">
            <h1 class="display-4 fw-bold animate__animated animate__fadeInDown">{{ $destination->name }}</h1>
            <p class="lead text-light mt-3 animate__animated animate__fadeInUp">
                Discover the magic of {{ $destination->name }}
            </p>
        </div>
    </section>

    <!-- Destination Details -->
    <section class="py-5 gradient-bg">
        <div class="container">
            <div class="row g-4">
                <!-- Main Info -->
                <div class="col-lg-8">
                    <div class="card glass-card shadow-lg p-5 border-0">
                        <h2 class="fw-bold mb-4 text-primary-emphasis">About {{ $destination->name }}</h2>

                        <div class="description-text">
                            {!! nl2br(e($destination->long_description ?? $destination->description)) !!}
                        </div>

                        @if (!empty($destination->highlights) && is_array($destination->highlights))
                            <h4 class="fw-bold mt-5 text-primary">Highlights</h4>
                            <ul class="list-group list-group-flush">
                                @foreach ($destination->highlights as $highlight)
                                    <li class="list-group-item bg-transparent border-0 px-0 py-2">
                                        <i class="bi bi-check-circle-fill text-success me-2"></i>{{ $highlight }}
                                    </li>
                                @endforeach
                            </ul>
                        @endif

                        {{-- Itinerary Section --}}
                        @if (!empty($destination->itenerary) && is_array($destination->itenerary))
                            <h4 class="fw-bold mt-5 text-primary">Itinerary</h4>
                            <div class="accordion custom-accordion" id="iteneraryAccordion">
                                @foreach ($destination->itenerary as $index => $day)
                                    <div class="accordion-item border-0 mb-2 shadow-sm rounded-3 overflow-hidden">
                                        <h2 class="accordion-header" id="heading{{ $index }}">
                                            <button class="accordion-button collapsed fw-semibold" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapse{{ $index }}">
                                                {{ $day['Day'] ?? 'Day ' . ($index + 1) }}
                                            </button>
                                        </h2>
                                        <div id="collapse{{ $index }}" class="accordion-collapse collapse">
                                            <div class="accordion-body text-muted">
                                                {{ $day['Activity'] ?? 'N/A' }}
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <p class="text-muted mt-3">Itinerary not available.</p>
                        @endif
                    </div>
                </div>

                <!-- Sidebar Info -->
                <div class="col-lg-4">
                    <div class="card glass-card shadow-lg p-4 border-0">
                        <h4 class="fw-bold mb-4 text-primary">Quick Info</h4>
                        <ul class="list-unstyled">
                            <li class="mb-2"><strong>Country:</strong> {{ $destination->country }}</li>
                            <li class="mb-2"><strong>Best Season:</strong> {{ $destination->best_season ?? 'All Year' }}</li>
                            <li class="mb-2"><strong>Duration:</strong> {{ $destination->average_duration ?? 'Varies' }}</li>
                        </ul>

                        <!-- Inquiry Button -->
                        @if ($destination->category == 'Day trips and excursions')
                            <button class="btn btn-gradient-primary w-100 rounded-pill mt-3 shadow-sm"
                                data-bs-toggle="modal" data-bs-target="#inquiryModal">
                                <i class="bi bi-envelope-fill me-2"></i>Inquire Now
                            </button>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Hotels/Tours -->
    @if ($destination->category != 'Day trips and excursions' && !empty($destination->tours))
        <section class="py-5 bg-light">
            <div class="container">
                <div class="text-center mb-5">
                    <h2 class="fw-bold mb-3">Hotels in {{ $destination->name }}</h2>
                    <p class="text-muted">Choose from our handpicked selection</p>
                </div>

                <div class="row g-4">
                    @foreach ($destination->tours as $tour)
                        <div class="col-md-6 col-lg-4">
                            <div class="card hotel-card h-100 shadow-sm border-0">
                                <div class="card-img-wrapper">
                                    <img src="{{ $tour->image }}" alt="{{ $tour->name }}"
                                        class="card-img-top rounded-top-4">
                                    <span class="price-tag">{{ $tour->price ?? '—' }}</span>
                                </div>
                                <div class="card-body text-center">
                                    <h5 class="fw-bold">{{ $tour->name }}</h5>
                                    <p class="text-muted small">{{ Str::limit($tour->description, 100) }}</p>
                                </div>
                                <div class="card-footer bg-transparent border-0">
                                    <a href="{{ route('tours.show', $tour->id) }}"
                                        class="btn btn-primary w-100 rounded-pill">Explore More</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    <!-- Gallery -->
    @if ($destination->category == 'Day trips and excursions' && !empty($destination->gallery) && is_array($destination->gallery))
        <section class="py-5 bg-light">
            <div class="container">
                <div class="text-center mb-5">
                    <h2 class="fw-bold mb-3">Gallery</h2>
                    <p class="text-muted">Experience the beauty of {{ $destination->name }}</p>
                </div>

                <div class="horizontal-gallery">
                    @foreach ($destination->gallery as $img)
                        @if (!empty($img['image']))
                            <div class="gallery-item">
                                <img src="{{ $img['image'] }}" class="gallery-img rounded-4 shadow-sm"
                                    alt="{{ $destination->name }} image"
                                    data-bs-toggle="modal" data-bs-target="#galleryModal"
                                    data-bs-img="{{ $img['image'] }}">
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    <!-- Inquiry Modal -->
    <div class="modal fade" id="inquiryModal" tabindex="-1" aria-labelledby="inquiryModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content shadow-lg rounded-4">
                <div class="modal-header border-0">
                    <h5 class="modal-title" id="inquiryModalLabel">Inquire about {{ $destination->name }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                      @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        <form action="{{ route('inquiries.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="destination_id" value="{{ $destination->id }}">
                            <input type="hidden" name="tour_id" value="">
                            @if (auth()->check())
                                <input type="hidden" name="user_id" value="{{ auth()->id() }}">
                            @endif

                            <div class="mb-3">
                                <label class="form-label">Full Name</label>
                                <input type="text" class="form-control rounded-pill" name="fullname" placeholder="John Doe" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control rounded-pill" name="email" placeholder="john@example.com" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Phone Number</label>
                                <input type="text" class="form-control rounded-pill" name="phone" placeholder="+1234567890" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Number of People</label>
                                <input type="number" class="form-control rounded-pill" name="people" min="1" value="1" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Preferred Date</label>
                                <input type="date" class="form-control rounded-pill" name="date" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Message (Optional)</label>
                                <textarea class="form-control rounded-3" name="message" rows="3" placeholder="Any questions or details"></textarea>
                            </div>

                            <button type="submit" class="btn btn-gradient-primary w-100 rounded-pill shadow-sm">
                                Send Inquiry
                            </button>
                        </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Gallery Modal -->
    <div class="modal fade" id="galleryModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 bg-transparent">
                <div class="modal-body p-0 text-center">
                    <img src="" id="galleryModalImg" class="img-fluid rounded shadow-lg modal-img" alt="">
                </div>
            </div>
        </div>
    </div>

    <!-- Styles -->
    <style>
        .destination-hero { height: 65vh; background-size: cover; background-position: center; position: relative; }
        .destination-hero .overlay { position: absolute; inset: 0; background: rgba(0, 0, 0, 0.55); }
        .gradient-bg { background: linear-gradient(to bottom right, #f8fbff, #eaf4ff); }
        .description-text { font-size: 1.05rem; line-height: 1.8; color: #555; column-count: 2; column-gap: 2rem; }
        @media (max-width: 768px) { .description-text { column-count: 1; } }
        .card-img-wrapper { position: relative; }
        .price-tag { position: absolute; bottom: 10px; right: 15px; background: #198754; color: white; padding: 5px 12px; border-radius: 20px; font-size: 0.9rem; }
        .horizontal-gallery { display: flex; overflow-x: auto; gap: 1rem; scroll-snap-type: x mandatory; }
        .gallery-item { flex: 0 0 auto; width: 260px; scroll-snap-align: start; }
        .gallery-img { width: 100%; height: 180px; object-fit: cover; transition: transform 0.3s; }
        .gallery-img:hover { transform: scale(1.05); }
    </style>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Gallery modal
            const imgs = document.querySelectorAll('.gallery-img');
            const modalImg = document.getElementById('galleryModalImg');
            imgs.forEach(img => {
                img.addEventListener('click', () => modalImg.src = img.dataset.bsImg);
            });
        });
    </script>
</x-main>
