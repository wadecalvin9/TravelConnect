<x-main>
    <title>Book Tour</title>
    <livewire:header2 />
    <section class="py-5" style="background: #f8f9fa;">
        <div class="container">

            <!-- Tour Card -->
            <div class="card border-0 shadow-lg mb-5 rounded-4 overflow-hidden">
                @if(!empty($tour->image))
                    <img src="{{ $tour->image }}" class="card-img-top" alt="Tour Image"
                        style="height: 350px; object-fit: cover; width: 100%;">
                @endif
                <div class="card-body text-center bg-white bg-opacity-90">
                    <h2 class="card-title fw-bold mb-3">{{ $tour->name }}</h2>
                    <p class="card-text text-muted">{{ $tour->description }}</p>
                </div>
            </div>

            <div class="row g-4">

                <!-- Itinerary -->
                <div class="col-12 col-lg-6">
                    <div class="card rounded-4 shadow-lg p-4 bg-white bg-opacity-90 border-0 h-100 d-flex flex-column">
                        <h4 class="mb-3 fw-bold text-primary">Itinerary</h4>
                        @if(!empty($tour->itenary) && is_array($tour->itenary))
                            <div class="accordion" id="itenaryAccordion" style="max-height: 400px; overflow-y: auto;">
                                @foreach($tour->itenary as $index => $day)
                                    <div class="accordion-item mb-2">
                                        <h2 class="accordion-header" id="heading{{ $index }}">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $index }}" aria-expanded="false" aria-controls="collapse{{ $index }}">
                                                {{ $day['Day'] ?? 'Day' }}
                                            </button>
                                        </h2>
                                        <div id="collapse{{ $index }}" class="accordion-collapse collapse" aria-labelledby="heading{{ $index }}" data-bs-parent="#itenaryAccordion">
                                            <div class="accordion-body">
                                                {{ $day['Activity'] ?? 'N/A' }}
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <p class="text-muted">Itinerary is not available.</p>
                        @endif
                    </div>
                </div>

                <!-- Inquiry Form -->
                <div class="col-12 col-lg-6">
                    <div class="card rounded-4 shadow-lg p-4 bg-white bg-opacity-90 border-0 h-100">
                        <h3 class="mb-4 fw-bold text-primary">Send an Inquiry</h3>
                        <form>
                            <div class="mb-3">
                                <label for="name" class="form-label">Full Name</label>
                                <input type="text" class="form-control rounded-pill" id="name"
                                    placeholder="John Doe" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control rounded-pill" id="email"
                                    placeholder="john@example.com" required>
                            </div>
                            <div class="mb-3">
                                <label for="phone" class="form-label">Phone Number</label>
                                <input type="text" class="form-control rounded-pill" id="phone"
                                    placeholder="+1234567890" required>
                            </div>
                            <div class="mb-3">
                                <label for="people" class="form-label">Number of People</label>
                                <input type="number" class="form-control rounded-pill" id="people" min="1"
                                    value="1" required>
                            </div>
                            <div class="mb-3">
                                <label for="date" class="form-label">Preferred Date</label>
                                <input type="date" class="form-control rounded-pill" id="date" required>
                            </div>
                            <div class="mb-3">
                                <label for="message" class="form-label">Message (Optional)</label>
                                <textarea class="form-control rounded-3" id="message" rows="4" placeholder="Any questions or details"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary w-100 rounded-pill shadow-sm">Send Inquiry</button>
                        </form>
                    </div>
                </div>

            </div>

            <!-- Gallery -->
            @if(!empty($tour->images) && is_array($tour->images))
                <h4 class="mt-5 mb-3 fw-bold text-primary">Gallery</h4>
                <div class="row g-3">
                    @foreach($tour->images as $index => $img)
                        @if(!empty($img['image']))
                            <div class="col-6 col-md-4 col-lg-3">
                                <div class="card rounded-3 shadow-sm gallery-image" style="cursor:pointer;">
                                    <img src="{{ $img['image'] }}" alt="Tour Image" class="card-img-top img-fluid uniform-img" data-bs-toggle="modal" data-bs-target="#galleryModal" data-bs-img="{{ $img['image'] }}">
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            @endif

        </div>
    </section>

    <!-- Lightbox Modal -->

<div class="modal fade" id="galleryModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 bg-transparent">
            <div class="modal-body p-0 d-flex justify-content-center align-items-center">
                <img src="" id="galleryModalImg" class="img-fluid rounded modal-img" alt="Tour Image">
            </div>
        </div>
    </div>
</div>

    <style>
        body {
            background: #f8f9fa;
            font-family: 'Poppins', sans-serif;
        }
        .modal-img {
    max-width: 90vw;  /* Maximum width: 90% of viewport */
    max-height: 80vh; /* Maximum height: 80% of viewport */
    object-fit: contain;
}

        .card {
            backdrop-filter: blur(10px);
        }

        .form-control:focus {
            box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
        }

        .btn-primary {
            background: linear-gradient(135deg, #0062E6, #33AEFF);
            border: none;
            transition: 0.3s;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
        }

        .uniform-img {
            height: 200px;
            object-fit: cover;
            width: 100%;
        }

        @media (max-width: 991px) {
            .card-img-top {
                height: 250px !important;
            }
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
