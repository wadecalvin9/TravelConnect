<x-main>
    <title>Tours</title>
    <livewire:header2 />
    <!-- Floating Session Success Alert -->
    @if (session('success'))
        <div class="position-fixed top-0 start-50 translate-middle-x mt-3"
             style="min-width: 320px; z-index: 2000;">
            <div class="alert alert-success alert-dismissible fade show shadow-lg" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    @endif

    <!-- Hero Section -->
    <section class="destinations hero"
        style="background-image: url('https://images.pexels.com/photos/1722206/pexels-photo-1722206.jpeg');
                background-size: cover;
                background-position: center;
                background-repeat: no-repeat;
                height: 50vh;
                display: flex;
                align-items: center;
                justify-content: center;
                color: white;
                text-align: center; padding-top: 20px;">
    </section>

    <!-- Tours Section -->
    <section class="py-5 bg-light" id="tours">
        <div class="container">
            <!-- Filter -->
            <form id="filterForm" class="row mb-4 g-2">
                <div class="col-md-3">
                    <select id="destinationFilter" class="form-select">
                        <option value="">Choose Destination</option>
                        @foreach ($destinations as $destination)
                            <option value="{{ $destination->id }}">{{ $destination->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3 d-flex gap-2">
                    <button type="submit" class="btn btn-primary flex-fill">Filter</button>
                    <button type="button" id="resetBtn" class="btn btn-outline-secondary flex-fill">Reset</button>
                </div>
            </form>

            <!-- Section title -->
            <div class="text-center mb-5">
                <h2 class="mb-3">Popular Tours</h2>
                <p class="text-muted">Explore the most loved tours by our travelers</p>
            </div>

            <!-- Tours Grid -->
            <div id="toursGrid" class="row g-4">
                @foreach ($tours as $tour)
                    <div class="col-md-4 tour-card" data-destination="{{ $tour->destination_id }}">
                        <div class="card border-0 shadow h-100">
                            <img src="{{ $tour->image }}" class="card-img-top" alt="{{ $tour->name }}"
                                style="height: 250px; object-fit: cover;">
                            <div class="card-body">
                                <h5 class="card-title">{{ $tour->name }}</h5>
                                <p class="card-text">{{ substr($tour->description, 0, 100) }}</p>
                            </div>
                            <div class="card-footer bg-transparent border-0">
                                <a href="{{ route('tours.show', $tour->id) }}" class="btn btn-primary w-100">Explore</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- JavaScript Filter + Reset -->
    <script>
        const filterForm = document.getElementById('filterForm');
        const resetBtn = document.getElementById('resetBtn');
        const tourCards = document.querySelectorAll('.tour-card');

        filterForm.addEventListener('submit', function(e) {
            e.preventDefault();
            const selectedDestination = document.getElementById('destinationFilter').value;

            tourCards.forEach(card => {
                card.style.display = !selectedDestination || card.dataset.destination === selectedDestination ? 'block' : 'none';
            });
        });

        resetBtn.addEventListener('click', function() {
            document.getElementById('destinationFilter').value = "";
            tourCards.forEach(card => {
                card.style.display = 'block';
            });
        });
    </script>
</x-main>
