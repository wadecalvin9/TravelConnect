<x-main>
    <livewire:header2 />

    <section class="py-5 bg-white text-dark" id="contact">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="mb-3">Get in Touch</h2>
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
                    <div class="card glass-card-light p-4 shadow-sm">
                        <h4 class="mb-3">Send a Message</h4>
                        <form>
                            <div class="mb-3">
                                <label for="name" class="form-label">Full Name</label>
                                <input type="text" class="form-control" id="name" placeholder="Your Name">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email Address</label>
                                <input type="email" class="form-control" id="email" placeholder="you@example.com">
                            </div>
                            <div class="mb-3">
                                <label for="message" class="form-label">Message</label>
                                <textarea class="form-control" id="message" rows="5" placeholder="Your message..."></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Send Message</button>
                        </form>
                    </div>
                </div>

                <!-- Review Form -->
                <div class="col-md-6">
                    <div class="card glass-card-light p-4 shadow-sm">
                        <h4 class="mb-3">Leave a Review</h4>
                        <form action="{{ route('reviews.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="review-name" class="form-label">Full Name</label>
                                <input type="text" name="name" class="form-control" id="review-name"
                                    placeholder="Your Name" required>
                            </div>

                            <div class="mb-3">
                                <label for="review-country" class="form-label">Location</label>
                                <input type="text" name="country" class="form-control" id="review-country"
                                    placeholder="Your Country" required>
                            </div>

                            <div class="mb-3">
                                <label for="review-message" class="form-label">Your Review</label>
                                <textarea class="form-control" name="comment" id="review-message" rows="4" placeholder="Share your experience..."
                                    required></textarea>
                            </div>

                            <button type="submit" class="btn btn-success w-100">Submit Review</button>
                        </form>
                    </div>
                </div>


                <!-- Contact Info & Map -->
                <div class="row g-4 mt-5">
                    <div class="col-md-6">
                        <div
                            class="card glass-card-light p-4 shadow-sm h-100 d-flex flex-column justify-content-center">
                            <h4 class="mb-3">Contact Info</h4>
                            <p><strong>Email:</strong> info@travelsite.com</p>
                            <p><strong>Phone:</strong> +1 234 567 890</p>
                            <p><strong>Address:</strong> 123 Travel Street, Adventure City, World</p>

                            <h5 class="mt-4 mb-2">Follow Us</h5>
                            <div class="d-flex gap-3">
                                <a href="#" class="btn btn-outline-primary btn-sm">Facebook</a>
                                <a href="#" class="btn btn-outline-primary btn-sm">Instagram</a>
                                <a href="#" class="btn btn-outline-primary btn-sm">Twitter</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card glass-card-light shadow-sm" style="height:400px;">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3153.0198231193163!2d-122.41941518468122!3d37.77492977975915!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8085809c64a75a9f%3A0x3a4b8d94b90fa3b2!2sSan+Francisco!5e0!3m2!1sen!2sus!4v1695427446223!5m2!1sen!2sus"
                                width="100%" height="100%" style="border:0; border-radius:15px;" allowfullscreen=""
                                loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                            </iframe>
                        </div>
                    </div>
                </div>
            </div>
    </section>

    <style>
        .glass-card-light {
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(6px);
            border-radius: 15px;
            border: 1px solid rgba(0, 0, 0, 0.1);
            color: #333;
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
    </style>

</x-main>
