<x-main>

    <!-- About Us Hero -->
    <section class="hero-about d-flex align-items-center justify-content-center text-center text-white"
        style="background-image: url('https://images.pexels.com/photos/414171/pexels-photo-414171.jpeg');
               background-size: cover; background-position: center; height: 60vh; padding-top: 50px; position: relative;">
        <div class="overlay"
            style="background: rgba(0,0,0,0.5); width: 100%; height: 100%; position: absolute; top:0; left:0;"></div>
        <div class="position-relative text-center px-3">
            <h1 class="display-4 fw-bold animate__animated animate__fadeInDown">{{ $setting->about_title }}</h1>
            <p class="lead animate__animated animate__fadeInUp animate__delay-1s">{{ $setting->about_description }}</p>
        </div>
    </section>

    <!-- Our Mission & Vision -->
    <section class="py-5">
        <div class="container">
            <div class="row g-4 text-center justify-content-center">
                <div class="col-md-5">
                    <div class="card glass-card-light p-5 shadow-lg h-100 animate__animated animate__fadeInLeft">
                        <h3 class="mb-3 fw-bold text-primary">Our Mission</h3>
                        <p class="text-muted">{{ $setting->mission }}</p>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="card glass-card-light p-5 shadow-lg h-100 animate__animated animate__fadeInRight">
                        <h3 class="mb-3 fw-bold text-primary">Our Vision</h3>
                        <p class="text-muted">{{ $setting->vision }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Team Section -->
    <section class="py-5 bg-light">
        <div class="container text-center">
            <h2 class="mb-5 fw-bold">Meet Our Team</h2>
            <div class="row g-4 justify-content-center">
                @foreach ($teams as $team)
                    <div class="col-6 col-md-3">
                        <div class="card glass-card-light shadow-lg h-100 text-center p-4 hover-zoom">
                            <img src="{{ $team->Image_url }}"
                                 class="rounded-circle mb-3 mx-auto d-block team-img"
                                 alt="{{ $team->name }}" width="120" height="120">
                            <h5 class="card-title fw-bold">{{ $team->name }}</h5>
                            <p class="card-text text-muted">{{ $team->position }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Achievements / Statistics -->
    <section class="py-5">
        <div class="container text-center">
            <h2 class="mb-5 fw-bold">Our Achievements</h2>
            <div class="row g-4 justify-content-center">
                <div class="col-6 col-md-3">
                    <div class="card glass-card-light shadow-lg p-4 hover-zoom">
                        <h3 class="text-primary mb-2 fw-bold">500+</h3>
                        <p class="text-muted">Happy Travelers</p>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="card glass-card-light shadow-lg p-4 hover-zoom">
                        <h3 class="text-primary mb-2 fw-bold">120</h3>
                        <p class="text-muted">Destinations Covered</p>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="card glass-card-light shadow-lg p-4 hover-zoom">
                        <h3 class="text-primary mb-2 fw-bold">50+</h3>
                        <p class="text-muted">Travel Experts</p>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="card glass-card-light shadow-lg p-4 hover-zoom">
                        <h3 class="text-primary mb-2 fw-bold">10+</h3>
                        <p class="text-muted">Years of Experience</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: #f0f4f8;
        }

        /* Glass card for light backgrounds */
        .glass-card-light {
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border-radius: 20px;
            border: 1px solid rgba(255, 255, 255, 0.3);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        /* Hover zoom for cards */
        .hover-zoom:hover {
            transform: translateY(-6px) scale(1.03);
            box-shadow: 0 18px 30px rgba(0, 0, 0, 0.2);
        }

        /* Team images hover effect */
        .team-img {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .team-img:hover {
            transform: scale(1.1);
            box-shadow: 0 8px 20px rgba(0,0,0,0.15);
        }

        /* Hero overlay text */
        .hero-about {
            position: relative;
            overflow: hidden;
        }

        .hero-about .overlay {
            z-index: 1;
        }

        .hero-about>.position-relative {
            z-index: 2;
        }

        /* Section titles */
        h2 {
            color: #1f2a5b;
        }

        /* Cards text */
        .card p {
            font-size: 0.95rem;
        }
    </style>

</x-main>
