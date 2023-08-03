<header class="py-5 bg-light border-bottom mb-4">
    <div class="container-fluid px-0">
        <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ asset('images/' . $slides[0]->gambar) }}" class="d-block w-100" height="400" alt="slide">
                    <div class="carousel-caption d-md-block">
                        <h1 class="fw-bolder">{{ $slides[0]->judul }}</h1>
                        {!! $slides[0]->kutipan !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
