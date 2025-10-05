<x-main>
    <title>Book Tour</title>

    <section class="py-3" style="background: linear-gradient(to right, #f0f4f8, #e4ebf5);">

        <div class="container">

            <!-- Tour Card with breathing space -->
            <div class="card tour-glass border-0 shadow-lg mb-5 rounded-4 overflow-hidden mt-5">
                @if (!empty($tour->image))
                    <img src="{{ $tour->image }}" class="card-img-top" alt="Tour Image"
                        style="height: 420px; object-fit: cover; width: 100%; transition: transform 0.4s ease;">
                @endif
                <div class="card-body text-center bg-white bg-opacity-50 backdrop-blur rounded-bottom-4">
                    <h2 class="card-title fw-bold mb-3">{{ $tour->name }}</h2>
                    <p class="card-text text-muted">{{ $tour->description }}</p>
                </div>
            </div>

            <!-- Gallery -->
            @if (!empty($tour->images) && is_array($tour->images))
                <h4 class="mt-5 mb-3 fw-bold text-primary">Gallery</h4>
                <div class="row g-3 mb-5 gallery-section">
                    @foreach ($tour->images as $index => $img)
                        @if (!empty($img['image']))
                            <div class="col-6 col-md-4 col-lg-3">
                                <div class="card rounded-3 shadow-sm gallery-image overflow-hidden">
                                    <img src="{{ $img['image'] }}" alt="Tour Image"
                                        class="card-img-top img-fluid uniform-img" data-bs-toggle="modal"
                                        data-bs-target="#galleryModal" data-bs-img="{{ $img['image'] }}">
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            @endif

            <div class="row g-4">

                <!-- Itinerary -->
                <div class="col-12 col-lg-6">
                    <div class="card tour-glass rounded-4 shadow-lg p-4 border-0 h-100 d-flex flex-column">
                        <h4 class="mb-3 fw-bold text-primary">Itinerary</h4>
                        @if (!empty($tour->itenary) && is_array($tour->itenary))
                            <div class="accordion" id="itenaryAccordion" style="max-height: 400px; overflow-y: auto;">
                                @foreach ($tour->itenary as $index => $day)
                                    <div class="accordion-item mb-2">
                                        <h2 class="accordion-header" id="heading{{ $index }}">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapse{{ $index }}"
                                                aria-expanded="false" aria-controls="collapse{{ $index }}">
                                                {{ $day['Day'] ?? 'Day' }}
                                            </button>
                                        </h2>
                                        <div id="collapse{{ $index }}" class="accordion-collapse collapse"
                                            aria-labelledby="heading{{ $index }}"
                                            data-bs-parent="#itenaryAccordion">
                                            <div class="accordion-body text-muted">
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
                    <div class="card tour-glass rounded-4 shadow-lg p-4 border-0 h-100">
                        <h3 class="mb-4 fw-bold text-primary">Send an Inquiry</h3>

                        <!-- Flash Message -->
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif

                        <form action="{{ route('inquiries.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="tour_id" value="{{ $tour->id }}">
                            <input type="hidden" name="destination_id" value="{{ $tour->destination_id }}">
                            @if (auth()->check())
                                <input type="hidden" name="user_id" value="{{ auth()->id() }}">
                            @endif

                            <div class="mb-3">
                                <label for="fullname" class="form-label">Full Name</label>
                                <input type="text" class="form-control rounded-pill" id="fullname" name="fullname"
                                    placeholder="John Doe" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control rounded-pill" id="email" name="email"
                                    placeholder="john@example.com" required>
                            </div>
                            <div class="mb-3">
                                <label for="phone" class="form-label">Phone Number</label>
                                <input type="text" class="form-control rounded-pill" id="phone" name="phone"
                                    placeholder="+1234567890" required>
                            </div>
                            <div class="mb-3">
                                <label for="people" class="form-label">Number of People</label>
                                <input type="number" class="form-control rounded-pill" id="people" name="people"
                                    min="1" value="1" required>
                            </div>
                            <div class="mb-3">
                                <label for="date" class="form-label">Preferred Date</label>
                                <input type="date" class="form-control rounded-pill" id="date" name="date"
                                    required>
                            </div>
                            <div class="mb-3">
                                <label for="message" class="form-label">Message (Optional)</label>
                                <textarea class="form-control rounded-3" id="message" name="message" rows="4"
                                    placeholder="Any questions or details"></textarea>
                            </div>
                            <button type="submit" class="btn btn-gradient-primary w-100 rounded-pill shadow-sm">
                                Send Inquiry
                            </button>
                        </form>
                    </div>
                </div>

            </div>

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
            background: #e9f0f8;
            font-family: 'Poppins', sans-serif;
        }

        /* Glass Cards */
        .tour-glass {
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(15px);
            -webkit-backdrop-filter: blur(15px);
            transition: all 0.3s ease;
        }
        .tour-glass:hover {
            transform: translateY(-6px);
            box-shadow: 0 16px 28px rgba(0, 0, 0, 0.25);
            background: rgba(255, 255, 255, 0.25);
        }

        /* Buttons */
        .btn-gradient-primary {
            background: linear-gradient(135deg, #0062E6, #33AEFF);
            border: none;
            color: #fff;
            transition: all 0.3s ease;
        }
        .btn-gradient-primary:hover {
            transform: translateY(-2px);
            background: linear-gradient(135deg, #33AEFF, #0062E6);
        }

        .form-control:focus {
            box-shadow: 0 0 0 0.25rem rgba(0, 123, 255, 0.25);
        }

        /* Gallery */
        .uniform-img {
            height: 200px;
            object-fit: cover;
            width: 100%;
            transition: transform 0.3s ease;
        }
        .gallery-image:hover img {
            transform: scale(1.05);
        }

        .modal-img {
            max-width: 90vw;
            max-height: 80vh;
            object-fit: contain;
        }

        .accordion-button {
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(10px);
        }
        .accordion-button:not(.collapsed) {
            background: rgba(255, 255, 255, 0.25);
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
