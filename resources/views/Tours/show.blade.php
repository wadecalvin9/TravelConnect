<x-main>
    <title>Book Tour</title>

    <section class="py-5" style="background: linear-gradient(to right, #eef3f9, #f8fbff);">
        <div class="container">

            <!-- Breadcrumb / Back -->
            <nav aria-label="breadcrumb" class="mb-4" style="padding-top: 10px">
                <ol class="breadcrumb bg-transparent p-0">
                    <li class="breadcrumb-item">
                        <a href="{{ url('/') }}" class="text-primary text-decoration-none">
                            <i class="bi bi-house-door-fill"></i> Home
                        </a>
                    </li>
                    <li class="breadcrumb-item active text-secondary" aria-current="page">{{ $tour->name }}</li>
                </ol>
            </nav>

            <!-- Tour Info + Inquiry Form -->
            <div class="row g-4 align-items-start">
                <!-- Left: Tour Info -->
                <div class="col-lg-7">
                    <div class="card border-0 shadow-lg rounded-4 overflow-hidden tour-card">
                        @if (!empty($tour->image))
                            <img src="{{ $tour->image }}" class="card-img-top" alt="Tour Image"
                                style="height: 400px; object-fit: cover;">
                        @endif

                        <div class="card-body bg-white rounded-bottom-4 p-4">
                            <h2 class="card-title fw-bold mb-3 text-primary">
                                <i class="bi bi-geo-alt-fill me-2 text-danger"></i>{{ $tour->name }}
                            </h2>

                            <!-- Enhanced Description Box -->
                            <div class="description-box p-3 rounded-4 mb-4">
                                <p class="text-muted lh-lg mb-0">
                                    {{ $tour->description ?? 'No description available for this tour yet.' }}
                                </p>
                            </div>

                            <!-- Optional Details -->
                            <div class="d-flex justify-content-between align-items-center mt-3">
                                <span class="badge rounded-pill px-3 py-2"
                                    style="background: linear-gradient(90deg,#e6f0ff,#d9f1ff); color:#0456d6;">
                                    <i class="bi bi-clock me-1"></i> Duration: {{ $tour->duration ?? 'N/A' }}
                                </span>
                                <span class="badge bg-success rounded-pill px-3 py-2">
                                    <span class="price-tag">{{ $tour->price ?? '—' }}</span>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right: Inquiry Form -->
                <div class="col-lg-5">
                    <div class="card border-0 rounded-4 shadow-lg p-4 inquiry-form">
                        <h3 class="fw-bold text-primary text-center mb-4">
                            <i class="bi bi-envelope-fill me-2"></i>Send an Inquiry
                        </h3>

                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif

                        <form id="inquiryForm" action="{{ route('inquiries.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="tour_id" value="{{ $tour->id }}">
                            <input type="hidden" name="destination_id" value="{{ $tour->destination_id }}">
                            @if (auth()->check())
                                <input type="hidden" name="user_id" value="{{ auth()->id() }}">
                            @endif

                            <div class="mb-3">
                                <label class="form-label">Full Name</label>
                                <input type="text" class="form-control rounded-pill" name="fullname"
                                    placeholder="John Doe" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control rounded-pill" name="email"
                                    placeholder="john@example.com" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Phone Number</label>
                                <input type="text" class="form-control rounded-pill" name="phone"
                                    placeholder="+1234567890" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Number of People</label>
                                <input type="number" class="form-control rounded-pill" name="people" min="1"
                                    value="1" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Preferred Date</label>
                                <input type="date" class="form-control rounded-pill" name="date" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Message (Optional)</label>
                                <textarea class="form-control rounded-3" name="message" rows="3" placeholder="Any questions or details"></textarea>
                            </div>

                            <button type="submit" id="sendBtn"
                                class="btn btn-gradient-primary w-100 rounded-pill shadow-sm">
                                Send Inquiry
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Horizontal Scrollable Gallery -->
            @php
                $images = $tour->images ?? [];
            @endphp

            @if (!empty($images) && is_iterable($images))
                <h4 class="mt-5 mb-3 fw-bold text-primary text-center">Gallery</h4>
                <div class="horizontal-gallery mb-5">
                    @foreach ($images as $img)
                        @php
                            // support both: ['image' => 'url'] items or plain string items
                            $imgSrc = is_array($img) ? $img['image'] ?? ($img['url'] ?? null) : $img;
                        @endphp
                        @if (!empty($imgSrc))
                            <div class="gallery-item">
                                <img src="{{ $imgSrc }}" class="gallery-img rounded-4 shadow-sm" alt="Tour Image"
                                    data-bs-toggle="modal" data-bs-target="#galleryModal"
                                    data-bs-img="{{ $imgSrc }}">
                            </div>
                        @endif
                    @endforeach
                </div>
            @endif

            <!-- Things to Do -->
            @php
                $things = $tour->thingToDos ?? collect();
            @endphp

            @if (!empty($things) && $things->count())
                <section class="mt-5 mb-5">
                    <h4 class="fw-bold text-primary mb-4 text-center">Things to Do</h4>
                    <div class="row g-4">
                        @foreach ($things as $thing)
                            <div class="col-md-4">
                                <div class="card border-0 shadow-sm h-100 rounded-4">
                                    <img src="{{ $thing->image ?? asset('images/placeholder.jpg') }}"
                                        class="card-img-top rounded-top-4" alt="{{ $thing->title ?? 'Activity' }}"
                                        style="height: 200px; object-fit: cover;">
                                    <div class="card-body text-center">
                                        <h5 class="fw-bold">{{ $thing->title ?? 'Untitled' }}</h5>
                                        <p class="text-muted small mb-0">
                                            {{ $thing->description ?? 'No description available.' }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </section>
            @endif
        </div>
    </section>

    <!-- Modal for Gallery -->
    <div class="modal fade" id="galleryModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 bg-transparent">
                <div class="modal-body p-0 text-center">
                    <img src="" id="galleryModalImg" class="img-fluid rounded modal-img" alt="Tour Image">
                </div>
            </div>
        </div>
    </div>

    <style>
        body {
            background: #f8fbff;
            font-family: 'Poppins', sans-serif;
        }

        .description-box {
            background: #f2f6fb;
            border-left: 5px solid #007bff;
        }

        .tour-card:hover {
            transform: translateY(-5px);
            transition: all 0.3s ease;
        }

        .inquiry-form {
            background: rgba(255, 255, 255, 0.98);
            backdrop-filter: blur(6px);
        }

        .btn-gradient-primary {
            background: linear-gradient(135deg, #0062E6, #33AEFF);
            border: none;
            color: #fff;
            transition: 0.3s;
        }

        .btn-gradient-primary:hover {
            background: linear-gradient(135deg, #33AEFF, #0062E6);
            transform: translateY(-2px);
        }

        /* Horizontal Gallery */
        .horizontal-gallery {
            display: flex;
            overflow-x: auto;
            gap: 1rem;
            padding-bottom: 0.5rem;
            scroll-snap-type: x mandatory;
            scrollbar-width: thin;
            scrollbar-color: #33AEFF #eef3f9;
        }

        .gallery-item {
            flex: 0 0 auto;
            width: 250px;
            scroll-snap-align: start;
        }

        .gallery-img {
            width: 100%;
            height: 180px;
            object-fit: cover;
            transition: transform 0.3s ease;
            cursor: pointer;
        }

        .gallery-img:hover {
            transform: scale(1.05);
        }

        .modal-img {
            max-width: 90vw;
            max-height: 80vh;
            object-fit: contain;
        }

        .horizontal-gallery::-webkit-scrollbar {
            height: 8px;
        }

        .horizontal-gallery::-webkit-scrollbar-thumb {
            background-color: #33AEFF;
            border-radius: 10px;



        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // ✅ Existing gallery image click handler
            document.querySelectorAll('.gallery-img').forEach(img => {
                img.addEventListener('click', function() {
                    const src = this.dataset.bsImg || this.getAttribute('src');
                    document.getElementById('galleryModalImg').src = src;
                });
            });

            // ✅ New form submit "Sending..." effect
            const inquiryForm = document.getElementById('inquiryForm');
            if (inquiryForm) {
                inquiryForm.addEventListener('submit', function() {
                    const btn = document.querySelector('#inquiryForm button[type="submit"]');
                    if (btn) {
                        btn.disabled = true;
                        btn.innerHTML = `
                    <span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span>
                    Sending...
                `;
                    }
                });
            }
        });
    </script>

</x-main>
