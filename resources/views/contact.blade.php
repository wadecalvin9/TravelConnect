<x-main>
    <section class="py-5 bg-light text-dark" id="contact">
        <div class="container">
            <!-- Section Header -->
            <div class="text-center mb-5">
                <h2 class="mb-3 fw-bold" style="color:#1f2a5b;">Get in Touch</h2>
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show shadow-lg" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <p class="text-muted">Have questions, want to plan your next trip, or share your experience? Send us a
                    message or leave a review!</p>
            </div>

            <div class="row g-4">
                <!-- Contact Form -->
                <div class="col-md-6">
                    <div class="card glass-card-light p-4 shadow-lg h-100">
                        <h4 class="mb-4 fw-bold text-primary">Send a Message</h4>
                        <form>
                            <div class="mb-3">
                                <label for="name" class="form-label">Full Name</label>
                                <input type="text" class="form-control rounded-pill" id="name" placeholder="Your Name">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email Address</label>
                                <input type="email" class="form-control rounded-pill" id="email" placeholder="you@example.com">
                            </div>
                            <div class="mb-3">
                                <label for="message" class="form-label">Message</label>
                                <textarea class="form-control rounded-3" id="message" rows="5" placeholder="Your message..."></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary w-100 rounded-pill shadow-sm">Send Message</button>
                        </form>
                    </div>
                </div>

                <!-- Review Form -->
                <div class="col-md-6">
                    <div class="card glass-card-light p-4 shadow-lg h-100">
                        <h4 class="mb-4 fw-bold text-success">Leave a Review</h4>
                        <form action="{{ route('reviews.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="review-name" class="form-label">Full Name</label>
                                <input type="text" name="name" class="form-control rounded-pill" id="review-name"
                                    placeholder="Your Name" required>
                            </div>

                            <div class="mb-3">
                                <label for="review-country" class="form-label">Location</label>
                                <input type="text" name="country" class="form-control rounded-pill" id="review-country"
                                    placeholder="Your Country" required>
                            </div>

                            <div class="mb-3">
                                <label for="review-message" class="form-label">Your Review</label>
                                <textarea class="form-control rounded-3" name="comment" id="review-message" rows="4" placeholder="Share your experience..."
                                    required></textarea>
                            </div>

                            <button type="submit" class="btn btn-success w-100 rounded-pill shadow-sm">Submit Review</button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Contact Info & Map -->
            <div class="row g-4 mt-5">
                <div class="col-md-6">
                    <div class="card glass-card-light p-4 shadow-lg h-100 d-flex flex-column justify-content-center">
                        <h4 class="mb-3 fw-bold text-primary">Contact Info</h4>
                        <p><strong>Email:</strong> {{ $setting->email }}</p>
                        <p><strong>Phone:</strong> {{ $setting->phone }}</p>
                        <p><strong>Address:</strong> {{ $setting->address }}</p>

                        <h5 class="mt-4 mb-3 fw-bold text-primary">Follow Us</h5>
                        <div class="d-flex gap-3 flex-wrap">
                            <a href="{{ $setting->facebook }}" class="btn btn-outline-primary btn-sm">Facebook</a>
                            <a href="{{ $setting->instagram }}" class="btn btn-outline-primary btn-sm">Instagram</a>
                            <a href="{{ $setting->twitter }}" class="btn btn-outline-primary btn-sm">Twitter</a>
                            <a href="{{ $setting->youtube }}" class="btn btn-outline-primary btn-sm">YouTube</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card glass-card-light shadow-lg overflow-hidden" style="height:400px; border-radius:20px;">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63819.26752067216!2d36.62410321560637!3d-1.3540457000547994!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x182f02e428edc063%3A0xd8c5ba0ad5a3c153!2sNgong!5e0!3m2!1sen!2ske!4v1758655213376!5m2!1sen!2ske"
                            width="100%" height="100%" style="border:0; border-radius:20px;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <style>
        .glass-card-light {
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            border: 1px solid rgba(0, 0, 0, 0.1);
            color: #333;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .glass-card-light:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(0,0,0,0.2);
        }

        .glass-card-light input,
        .glass-card-light textarea,
        .glass-card-light select {
            background: rgba(255, 255, 255, 0.9);
            color: #333;
            border: 1px solid rgba(0, 0, 0, 0.1);
        }

        .glass-card-light input::placeholder,
        .glass-card-light textarea::placeholder {
            color: rgba(0, 0, 0, 0.5);
        }

        .glass-card-light .btn {
            transition: all 0.3s ease;
        }

        .glass-card-light .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
        }

        h2, h4, h5 {
            letter-spacing: 0.5px;
        }
    </style>
</x-main>
