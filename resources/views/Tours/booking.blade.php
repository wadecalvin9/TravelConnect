<x-main>
<title>Book Tour</title>

<section class="py-5" style="background: #f8f9fa;">
  <div class="container">

    <!-- Tour Card -->
    <div class="card border-0 shadow-lg mb-5 rounded-4 overflow-hidden">
      <img src="https://images.pexels.com/photos/1722206/pexels-photo-1722206.jpeg"
           class="card-img-top"
           alt="Tour Image"
           style="height: 350px; object-fit: cover; width: 100%;">
      <div class="card-body text-center bg-white bg-opacity-90">
        <h2 class="card-title fw-bold mb-3">Tour Name Placeholder</h2>
        <p class="card-text text-muted">Explore the highlights of this amazing tour. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur sed arcu eget felis consectetur fermentum.</p>
      </div>
    </div>

    <div class="row g-4">

      <!-- Itinerary -->
      <div class="col-12 col-lg-6">
        <div class="card rounded-4 shadow-lg p-4 bg-white bg-opacity-90 border-0">
          <h4 class="mb-3 fw-bold text-primary">Itinerary</h4>
          <ul class="list-group list-group-flush">
            <li class="list-group-item border-0 mb-2 rounded-3 shadow-sm"><strong>Day 1:</strong> Arrival and hotel check-in.</li>
            <li class="list-group-item border-0 mb-2 rounded-3 shadow-sm"><strong>Day 2:</strong> City tour and sightseeing.</li>
            <li class="list-group-item border-0 mb-2 rounded-3 shadow-sm"><strong>Day 3:</strong> Free day for optional activities.</li>
            <li class="list-group-item border-0 rounded-3 shadow-sm"><strong>Day 4:</strong> Departure.</li>
          </ul>
        </div>
      </div>

      <!-- Inquiry Form -->
      <div class="col-12 col-lg-6">
        <div class="card rounded-4 shadow-lg p-4 bg-white bg-opacity-90 border-0">
          <h3 class="mb-4 fw-bold text-primary">Send an Inquiry</h3>
          <form>
            <div class="mb-3">
              <label for="name" class="form-label">Full Name</label>
              <input type="text" class="form-control rounded-pill" id="name" placeholder="John Doe" required>
            </div>
            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input type="email" class="form-control rounded-pill" id="email" placeholder="john@example.com" required>
            </div>
            <div class="mb-3">
              <label for="phone" class="form-label">Phone Number</label>
              <input type="text" class="form-control rounded-pill" id="phone" placeholder="+1234567890" required>
            </div>
            <div class="mb-3">
              <label for="people" class="form-label">Number of People</label>
              <input type="number" class="form-control rounded-pill" id="people" min="1" value="1" required>
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
