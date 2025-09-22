<x-main>
<livewire:header2/>
<!-- About Us Hero -->
<section class="hero-about d-flex align-items-center justify-content-center text-center text-white"
         style="background-image: url('https://images.pexels.com/photos/414171/pexels-photo-414171.jpeg'); background-size: cover; background-position: center; height: 50vh;">
  <div class="overlay" style="background: rgba(0,0,0,0.4); width: 100%; height: 100%; position: absolute; top:0; left:0;"></div>
  <div class="position-relative">
    <h1 class="display-4 fw-bold animate__animated animate__fadeInDown">About Us</h1>
    <p class="lead animate__animated animate__fadeInUp animate__delay-1s">Discover our story, passion, and adventures around the world.</p>
  </div>
</section>

<!-- Our Mission & Vision -->
<section class="py-5 bg-light">
  <div class="container">
    <div class="row g-4 text-center">
      <div class="col-md-6">
        <div class="card glass-card-light p-4 shadow-sm h-100 animate__animated animate__fadeInLeft">
          <h3 class="mb-3">Our Mission</h3>
          <p>To provide unforgettable travel experiences that create lasting memories for our clients, combining comfort, adventure, and culture.</p>
        </div>
      </div>
      <div class="col-md-6">
        <div class="card glass-card-light p-4 shadow-sm h-100 animate__animated animate__fadeInRight">
          <h3 class="mb-3">Our Vision</h3>
          <p>To be the most trusted and innovative travel company, inspiring wanderlust while delivering exceptional service worldwide.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Team Section -->
<section class="py-5">
  <div class="container text-center">
    <h2 class="mb-4">Meet Our Team</h2>
    <div class="row g-4 justify-content-center">
      <div class="col-md-3">
        <div class="card glass-card-light shadow-sm h-100 text-center p-3 hover-zoom">
          <img src="https://randomuser.me/api/portraits/women/68.jpg" class="rounded-circle mb-3" alt="Team Member" width="120" height="120">
          <h5 class="card-title">Alice Smith</h5>
          <p class="card-text text-muted">Founder & CEO</p>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card glass-card-light shadow-sm h-100 text-center p-3 hover-zoom">
          <img src="https://randomuser.me/api/portraits/men/32.jpg" class="rounded-circle mb-3" alt="Team Member" width="120" height="120">
          <h5 class="card-title">John Doe</h5>
          <p class="card-text text-muted">Head of Operations</p>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card glass-card-light shadow-sm h-100 text-center p-3 hover-zoom">
          <img src="https://randomuser.me/api/portraits/women/44.jpg" class="rounded-circle mb-3" alt="Team Member" width="120" height="120">
          <h5 class="card-title">Emily White</h5>
          <p class="card-text text-muted">Travel Consultant</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Achievements / Statistics -->
<section class="py-5 bg-light">
  <div class="container text-center">
    <h2 class="mb-5">Our Achievements</h2>
    <div class="row g-4">
      <div class="col-md-3">
        <div class="card glass-card-light shadow-sm p-4 hover-zoom">
          <h3 class="text-primary mb-2">500+</h3>
          <p>Happy Travelers</p>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card glass-card-light shadow-sm p-4 hover-zoom">
          <h3 class="text-primary mb-2">120</h3>
          <p>Destinations Covered</p>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card glass-card-light shadow-sm p-4 hover-zoom">
          <h3 class="text-primary mb-2">50+</h3>
          <p>Travel Experts</p>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card glass-card-light shadow-sm p-4 hover-zoom">
          <h3 class="text-primary mb-2">10+</h3>
          <p>Years of Experience</p>
        </div>
      </div>
    </div>
  </div>
</section>

<style>
/* Glass card for light bg */
.glass-card-light {
  background: rgba(255,255,255,0.9);
  backdrop-filter: blur(6px);
  border-radius: 15px;
  border: 1px solid rgba(0,0,0,0.1);
  transition: transform 0.3s ease, box-shadow 0.3s ease;
}

/* Hover zoom for cards */
.hover-zoom:hover {
  transform: translateY(-5px) scale(1.02);
  box-shadow: 0 10px 20px rgba(0,0,0,0.15);
}

/* Team images hover effect */
.card img.rounded-circle {
  transition: transform 0.3s ease;
}
.card img.rounded-circle:hover {
  transform: scale(1.1);
}

/* Hero overlay text */
.hero-about {
  position: relative;
  overflow: hidden;
}
.hero-about .overlay {
  z-index: 1;
}
.hero-about > .position-relative {
  z-index: 2;
}

/* Animate.css optional: include animate.css for animations */
</style>



</x-main>
