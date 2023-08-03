<!-- Side widgets-->
<div class="col-lg-4">
    <!-- Search widget-->
    <div class="card mb-4">
        <div class="card-header">Search</div>
        <div class="card-body">

            <form action="/artikel">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Enter search term..." name="cari" />
                    <button class="btn btn-primary" id="button-search" type="submit">Go!</button>
                </div>
            </form>
        </div>
    </div>
    <!-- Categories widget-->
    <div class="card mb-4">
        <div class="card-header">Categories</div>
        <div class="card-body">
            <div class="row">
                <div class="col-sm text-center">
                    @foreach ($categories as $kategori)
                        <a href="/artikel?kategori={{ $kategori->slug }}" class="btn btn-sm btn-primary">{{ $kategori->nama }} - @if ($kategori->articles->count())
                                {{ $kategori->articles->count() }}
                            @endif </a>
                    @endforeach
                </div>

            </div>
        </div>
    </div>
    <!-- Side widget-->
    <div class="card mb-4">
        <div class="card-header">{{ $label }}</div>
        <div class="card-body">
            @foreach ($views as $view)
                <div class="row mb-3">
                    <div class="col-4">
                        <a href="/artikel/{{ $view->slug }}"><img src="{{ asset('images/' . $view->gambar) }}" class="img-fluid rounded-0"></a>
                    </div>
                    <div class="col-8">
                        <a href="/artikel/{{ $view->slug }}" class="text-dark text-decoration-none d-block h6">{{ $view->judul }}</a>
                        <small class="text-muted">{{ $view->created_at->format('d F Y') }}</small>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
