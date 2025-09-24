<x-main>
    <title>Blog</title>

<section class="py-5 bg-light position-relative" id="blog">
  <div class="container">
    <div class="text-center mb-5">
      <h2 class="mb-3 fw-bold" style="color:#1f2a5b;">Travel Stories & Guides</h2>
      <p class="text-muted">Explore our latest adventures, tips, and travel inspiration</p>
    </div>

    <!-- Arrow Buttons -->
    <button id="scrollLeft" class="btn btn-dark rounded-circle position-absolute top-50 start-0 translate-middle-y shadow"
            style="z-index:10; width:45px; height:45px; font-size:20px;">
      &#8592;
    </button>
    <button id="scrollRight" class="btn btn-dark rounded-circle position-absolute top-50 end-0 translate-middle-y shadow"
            style="z-index:10; width:45px; height:45px; font-size:20px;">
      &#8594;
    </button>

    <!-- Scrollable Blog Carousel -->
    <div class="d-flex flex-row flex-nowrap overflow-x-auto gap-4 pb-3 scroll-snap-center" id="blogScroll">

      <!-- Blog Post 1 -->
      <div class="card text-white flex-shrink-0 position-relative glass-card hover-zoom fade-in">
        <img src="https://images.pexels.com/photos/261102/pexels-photo-261102.jpeg"
             class="card-img" style="height:380px; object-fit:cover; border-radius:20px;" alt="Post 1">
        <div class="card-img-overlay d-flex flex-column justify-content-end p-3"
             style="background: linear-gradient(to top, rgba(0,0,0,0.55), transparent 70%); border-radius:20px;">
          <h4 class="card-title fw-bold">Exploring Hidden Gems of Europe</h4>
          <p class="card-text">Discover lesser-known destinations with breathtaking scenery.</p>
          <a href="#" class="btn btn-primary rounded-pill mt-2 shadow-sm btn-glow">Read More</a>
        </div>
      </div>

      <!-- Blog Post 2 -->
      <div class="card text-white flex-shrink-0 position-relative glass-card hover-zoom fade-in">
        <img src="https://images.pexels.com/photos/21014/pexels-photo.jpg"
             class="card-img" style="height:380px; object-fit:cover; border-radius:20px;" alt="Post 2">
        <div class="card-img-overlay d-flex flex-column justify-content-end p-3"
             style="background: linear-gradient(to top, rgba(0,0,0,0.55), transparent 70%); border-radius:20px;">
          <h4 class="card-title fw-bold">Budget Travel Tips</h4>
          <p class="card-text">Maximize your adventure without breaking the bank.</p>
          <a href="#" class="btn btn-primary rounded-pill mt-2 shadow-sm btn-glow">Read More</a>
        </div>
      </div>

      <!-- Blog Post 3 -->
      <div class="card text-white flex-shrink-0 position-relative glass-card hover-zoom fade-in">
        <img src="https://images.pexels.com/photos/346885/pexels-photo-346885.jpeg"
             class="card-img" style="height:380px; object-fit:cover; border-radius:20px;" alt="Post 3">
        <div class="card-img-overlay d-flex flex-column justify-content-end p-3"
             style="background: linear-gradient(to top, rgba(0,0,0,0.55), transparent 70%); border-radius:20px;">
          <h4 class="card-title fw-bold">Top Beach Destinations</h4>
          <p class="card-text">From tropical paradises to secluded shores, find your next beach escape.</p>
          <a href="#" class="btn btn-primary rounded-pill mt-2 shadow-sm btn-glow">Read More</a>
        </div>
      </div>

      <!-- Blog Post 4 -->
      <div class="card text-white flex-shrink-0 position-relative glass-card hover-zoom fade-in">
        <img src="https://images.pexels.com/photos/460621/pexels-photo-460621.jpeg"
             class="card-img" style="height:380px; object-fit:cover; border-radius:20px;" alt="Post 4">
        <div class="card-img-overlay d-flex flex-column justify-content-end p-3"
             style="background: linear-gradient(to top, rgba(0,0,0,0.55), transparent 70%); border-radius:20px;">
          <h4 class="card-title fw-bold">Cultural Experiences</h4>
          <p class="card-text">Engage with local traditions, festivals, and cuisines for a richer travel experience.</p>
          <a href="#" class="btn btn-primary rounded-pill mt-2 shadow-sm btn-glow">Read More</a>
        </div>
      </div>

    </div>
  </div>
</section>

<style>
  /* Glass card style */
  .glass-card {
    background: rgba(255, 255, 255, 0.05);
    backdrop-filter: blur(14px);
    border-radius: 20px;
    border: 1px solid rgba(255, 255, 255, 0.2);
    transition: transform 0.5s ease, box-shadow 0.5s ease;
    overflow: hidden;
    min-width: 420px;
    max-width: 420px;
    scroll-snap-align: center;
  }

  .hover-zoom:hover {
    transform: translateY(-10px) scale(1.05);
    box-shadow: 0 20px 40px rgba(0,0,0,0.35);
  }

  .btn-glow {
    transition: all 0.3s ease;
  }
  .btn-glow:hover {
    box-shadow: 0 0 15px rgba(0, 162, 255, 0.7);
    transform: translateY(-2px);
  }

  .fade-in {
    opacity: 0;
    transform: translateY(20px);
    animation: fadeInUp 1s forwards;
  }

  @keyframes fadeInUp {
    to {
      opacity: 1;
      transform: translateY(0);
    }
  }

  .scroll-snap-center {
    display: flex;
    overflow-x: auto;
    scroll-snap-type: x mandatory;
    scroll-padding: 50%;
    gap: 16px;
    scroll-behavior: smooth;
    -webkit-overflow-scrolling: touch;
    padding-bottom: 1rem;
  }

  .scroll-snap-center::-webkit-scrollbar {
    height: 8px;
  }
  .scroll-snap-center::-webkit-scrollbar-thumb {
    background: rgba(0,0,0,0.25);
    border-radius: 4px;
  }

  #scrollLeft, #scrollRight {
    background: linear-gradient(135deg, #0062E6, #33AEFF);
    border: none;
    color: white;
    transition: transform 0.3s;
  }
  #scrollLeft:hover, #scrollRight:hover {
    transform: scale(1.1);
  }

  @media (max-width: 991px){
    #scrollLeft, #scrollRight {
      display: none;
    }
    .glass-card {
      min-width: 90%;
      max-width: 90%;
    }
  }

  .card-img-overlay h4, .card-img-overlay p {
    text-shadow: 0 2px 8px rgba(0,0,0,0.7);
  }
</style>

<script>
  const scrollContainer = document.getElementById('blogScroll');
  const btnLeft = document.getElementById('scrollLeft');
  const btnRight = document.getElementById('scrollRight');

  function scrollByCard() {
    const cards = scrollContainer.querySelectorAll('.glass-card');
    const cardWidth = cards[0].offsetWidth + 16;
    return cardWidth;
  }

  btnLeft.addEventListener('click', () => {
    scrollContainer.scrollBy({ left: -scrollByCard(), behavior: 'smooth' });
  });
  btnRight.addEventListener('click', () => {
    scrollContainer.scrollBy({ left: scrollByCard(), behavior: 'smooth' });
  });
</script>

</x-main>
