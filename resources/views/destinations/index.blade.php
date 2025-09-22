<x-main>
<title>Tours</title>
<livewire:header2/>
<section class="destinations hero"
         style="background-image: url('https://images.pexels.com/photos/462162/pexels-photo-462162.jpeg');
                background-size: cover;
                background-position: center;
                background-repeat: no-repeat;
                height: 50vh;
                display: flex;
                align-items: center;
                justify-content: center;
                color: white;
                text-align: center;">
</section>
<section class="py-5 bg-light" id="destinations">
  <div class="container">
    <!-- Filter -->
    <!-- Section title -->
    <div class="text-center mb-5">
      <h2 class="mb-3">Popular Destinations</h2>
      <p class="text-muted">Explore the most loved destinations by our travelers</p>
    </div>

    <!-- Destinations Grid -->
    <div id="destinationsGrid" class="row g-4">

        @foreach ($destinations as $destination)
         <div class="col-md-4 destination"
           data-country="france"
           data-price="luxury"
           data-duration="1week">
        <div class="card border-0 shadow h-100">
          <img src="{{ $destination->image }}"
               class="card-img-top"
               alt="Paris"
               style="height: 250px; object-fit: cover;">
          <div class="card-body">
            <h5 class="card-title">{{ $destination->name }}</h5>
            <p class="card-text">{{ $destination->description }}</p>
          </div>
          <div class="card-footer bg-transparent border-0">
            <a href="#" class="btn btn-primary w-100">Explore</a>
          </div>
        </div>
      </div>
        @endforeach
    </div>
  </div>
</section>





</x-main>
