<x-main>
    <title>Blog</title>
<livewire:header2/>


<section class="py-5 bg-light position-relative" id="blog">
  <div class="container">
    <div class="text-center mb-5">
      <h2 class="mb-3">Travel Stories & Guides</h2>
      <p class="text-muted">Explore our latest adventures, tips, and travel inspiration</p>
    </div>

    <!-- Arrow Buttons -->
    <button id="scrollLeft" class="btn btn-dark position-absolute top-50 start-0 translate-middle-y" style="z-index:10;">
      &#8592;
    </button>
    <button id="scrollRight" class="btn btn-dark position-absolute top-50 end-0 translate-middle-y" style="z-index:10;">
      &#8594;
    </button>

    <!-- Scrollable Blog Carousel -->
    <div class="d-flex flex-row flex-nowrap overflow-x-auto gap-3 pb-3 scroll-snap-container" id="blogScroll">

      <!-- Blog Post 1 -->
      <div class="card text-white flex-shrink-0 position-relative glass-card hover-zoom" style="min-width:400px; max-width:400px; height:350px;">
        <img src="https://images.pexels.com/photos/261102/pexels-photo-261102.jpeg"
             class="card-img" style="height:100%; object-fit:cover;" alt="Post 1">
        <div class="card-img-overlay d-flex flex-column justify-content-end p-3">
          <h4 class="card-title fw-bold">Exploring Hidden Gems of Europe</h4>
          <p class="card-text">Discover lesser-known destinations with breathtaking scenery.</p>
          <a href="#" class="btn btn-primary">Read More</a>
        </div>
      </div>

      <!-- Blog Post 2 -->
      <div class="card text-white flex-shrink-0 position-relative glass-card hover-zoom" style="min-width:400px; max-width:400px; height:350px;">
        <img src="https://images.pexels.com/photos/21014/pexels-photo.jpg"
             class="card-img" style="height:100%; object-fit:cover;" alt="Post 2">
        <div class="card-img-overlay d-flex flex-column justify-content-end p-3">
          <h4 class="card-title fw-bold">Budget Travel Tips</h4>
          <p class="card-text">Maximize your adventure without breaking the bank.</p>
          <a href="#" class="btn btn-primary">Read More</a>
        </div>
      </div>

      <!-- Blog Post 3 -->
      <div class="card text-white flex-shrink-0 position-relative glass-card hover-zoom" style="min-width:400px; max-width:400px; height:350px;">
        <img src="https://images.pexels.com/photos/346885/pexels-photo-346885.jpeg"
             class="card-img" style="height:100%; object-fit:cover;" alt="Post 3">
        <div class="card-img-overlay d-flex flex-column justify-content-end p-3">
          <h4 class="card-title fw-bold">Top Beach Destinations</h4>
          <p class="card-text">From tropical paradises to secluded shores, find your next beach escape.</p>
          <a href="#" class="btn btn-primary">Read More</a>
        </div>
      </div>

      <!-- Blog Post 4 -->
      <div class="card text-white flex-shrink-0 position-relative glass-card hover-zoom" style="min-width:400px; max-width:400px; height:350px;">
        <img src="https://images.pexels.com/photos/460621/pexels-photo-460621.jpeg"
             class="card-img" style="height:100%; object-fit:cover;" alt="Post 4">
        <div class="card-img-overlay d-flex flex-column justify-content-end p-3">
          <h4 class="card-title fw-bold">Cultural Experiences</h4>
          <p class="card-text">Engage with local traditions, festivals, and cuisines for a richer travel experience.</p>
          <a href="#" class="btn btn-primary">Read More</a>
        </div>
      </div>

    </div>
  </div>
</section>

<style>
  /* Glass effect */
  .glass-card {
    background: rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(10px);
    border-radius: 15px;
    overflow: hidden;
    border: 1px solid rgba(255, 255, 255, 0.2);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
  }

  /* Hover zoom effect */
  .hover-zoom:hover {
    transform: scale(1.05);
    box-shadow: 0 10px 20px rgba(0,0,0,0.3);
  }

  /* Smooth horizontal scroll with snapping */
  .scroll-snap-container {
    scroll-behavior: smooth;
    scroll-snap-type: x mandatory;
    -webkit-overflow-scrolling: touch;
  }
  .scroll-snap-container .card {
    scroll-snap-align: start;
  }

  /* Scrollbar styling */
  .scroll-snap-container::-webkit-scrollbar {
    height: 8px;
  }
  .scroll-snap-container::-webkit-scrollbar-thumb {
    background: rgba(0,0,0,0.3);
    border-radius: 4px;
  }

  /* Hide arrows on mobile */
  @media (max-width: 991px){
    #scrollLeft, #scrollRight {
      display: none;
    }
  }
</style>

<script>
  const scrollContainer = document.getElementById('blogScroll');
  const btnLeft = document.getElementById('scrollLeft');
  const btnRight = document.getElementById('scrollRight');

  // Scroll by one card width
  const cardWidth = scrollContainer.querySelector('.card').offsetWidth + 12; // 12 = gap px

  btnLeft.addEventListener('click', () => {
    scrollContainer.scrollBy({ left: -cardWidth, behavior: 'smooth' });
  });

  btnRight.addEventListener('click', () => {
    scrollContainer.scrollBy({ left: cardWidth, behavior: 'smooth' });
  });
</script>









</x-main>
