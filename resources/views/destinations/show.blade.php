<x-main>
    <title>{{ $destination->name }}</title>

    <!-- Hero Section -->
    <section class="destination-hero d-flex align-items-center justify-content-center text-center text-white"
             style="background-image: url('{{ $destination->image }}');
                    background-size: cover;
                    background-position: center;
                    height: 60vh;
                    position: relative;">
        <div class="overlay" style="position:absolute; top:0; left:0; width:100%; height:100%; background: rgba(0,0,0,0.4);"></div>
        <div class="position-relative">
            <h1 class="display-4 fw-bold animate__animated animate__fadeInDown">{{ $destination->name }}</h1>
            <p class="lead animate__animated animate__fadeInUp animate__delay-1s">{{ $destination->description }}</p>
        </div>
    </section>

    <!-- Destination Details -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-8">
                    <div class="card glass-card shadow-lg p-4 border-0">
                        <h2 class="fw-bold mb-3">About {{ $destination->name }}</h2>
                        <p class="text-muted">{{ $destination->long_description ?? $destination->description }}</p>
                        @if (!empty($destination->highlights) && is_array($destination->highlights))
                            <h4 class="fw-bold mt-4">Highlights</h4>
                            <ul class="list-group list-group-flush">
                                @foreach ($destination->highlights as $highlight)
                                    <li class="list-group-item bg-transparent border-0 px-0 py-1">
                                        <i class="bi bi-check-circle-fill text-primary me-2"></i>{{ $highlight }}
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>

                <!-- Side Info -->
                <div class="col-lg-4">
                    <div class="card glass-card shadow-lg p-4 border-0">
                        <h4 class="fw-bold mb-3">Quick Info</h4>
                        <p><strong>Country:</strong> {{ $destination->country }}</p>
                        <p><strong>Best Season:</strong> {{ $destination->best_season ?? 'All Year' }}</p>
                        <p><strong>Average Duration:</strong> {{ $destination->average_duration ?? 'Varies' }}</p>
                        <a href="{{ route('tours.index', ['destination' => $destination->id]) }}" class="btn btn-primary w-100 rounded-pill mt-3">View Tours</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Tours in this Destination -->
    @if (!empty($destination->tours))
    <section class="py-5">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold mb-3">Tours in {{ $destination->name }}</h2>
                <p class="text-muted">Choose from our curated tours for this destination</p>
            </div>

            <div class="row g-4">
                @foreach ($destination->tours as $tour)
                    <div class="col-md-4">
                        <div class="card glass-card shadow-lg h-100 border-0 hover-zoom">
                            <img src="{{ $tour->image }}" class="card-img-top" alt="{{ $tour->name }}" style="height:250px; object-fit:cover;">
                            <div class="card-body text-center">
                                <h5 class="card-title fw-bold">{{ $tour->name }}</h5>
                                <p class="card-text text-muted">{{ Str::limit($tour->description, 100) }}</p>
                            </div>
                            <div class="card-footer bg-transparent border-0">
                                <a href="{{ route('tours.show', $tour->id) }}" class="btn btn-primary w-100 rounded-pill shadow-sm">Explore Tour</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    <!-- Gallery -->
    @if (!empty($destination->images) && is_array($destination->images))
    <section class="py-5 bg-light">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold mb-3">Gallery</h2>
                <p class="text-muted">Experience the beauty of {{ $destination->name }}</p>
            </div>
            <div class="row g-3">
                @foreach ($destination->images as $img)
                    @if (!empty($img['image']))
                    <div class="col-6 col-md-4 col-lg-3">
                        <div class="card rounded-3 shadow-sm gallery-image">
                            <img src="{{ $img['image'] }}" alt="Destination Image" class="card-img-top img-fluid uniform-img" data-bs-toggle="modal" data-bs-target="#galleryModal" data-bs-img="{{ $img['image'] }}">
                        </div>
                    </div>
                    @endif
                @endforeach
            </div>
        </div>
    </section>
    @endif

    <!-- Lightbox Modal -->
    <div class="modal fade" id="galleryModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 bg-transparent">
                <div class="modal-body p-0 d-flex justify-content-center align-items-center">
                    <img src="" id="galleryModalImg" class="img-fluid rounded modal-img" alt="Destination Image">
                </div>
            </div>
        </div>
    </div>

    <style>
        .glass-card {
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            border: 1px solid rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .hover-zoom:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(0,0,0,0.2);
        }

        .uniform-img {
            height: 200px;
            object-fit: cover;
            width: 100%;
        }

        .gallery-image {
            cursor: pointer;
        }

        .modal-img {
            max-width: 90vw;
            max-height: 80vh;
            object-fit: contain;
        }

        .destination-hero .overlay {
            z-index: 1;
        }
        .destination-hero>.position-relative {
            z-index: 2;
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const galleryImages = document.querySelectorAll('.gallery-image img');
            const modalImg = document.getElementById('galleryModalImg');

            galleryImages.forEach(img => {
                img.addEventListener('click', function() {
                    modalImg.src = this.dataset.bsImg;
                });
            });
        });
    </script>
</x-main>
