<x-main>
    <title>Book Tour</title>
    <livewire:header2 />

    <section class="py-5" style="background: #f8f9fa;">
        <div class="container">

            <!-- Tour Card -->
            <div class="card border-0 shadow-lg mb-5 rounded-4 overflow-hidden">
                <img src="{{ $tour->image }}" class="card-img-top" alt="Tour Image"
                    style="height: 350px; object-fit: cover; width: 100%;">
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
                        <div class="overflow-auto" style="max-height: 400px;">
                            <ul class="list-group list-group-flush">
                                @foreach ($tour->itenary as $day)
                                    <li class="list-group-item border-0 mb-2 rounded-3 shadow-sm">
                                        <strong>{{ $day['Day'] }}:</strong> {{ $day['Activity'] }}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
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
                            <button type="submit" class="btn btn-primary w-100 rounded-pill shadow-sm">Send
                                Inquiry</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <style>
        body {
            background: #f8f9fa;
            font-family: 'Poppins', sans-serif;
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

        ul.list-group li {
            word-wrap: break-word;
        }

        @media (max-width: 991px) {
            .card-img-top {
                height: 250px !important;
            }
        }
    </style>
</x-main>
