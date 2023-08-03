@extends('blog.layout.main')

@section('content')
    <div class="col-lg-8">
        <!-- Featured blog post-->
        {{-- <div class="card mb-4">
            <a href="/artikel/"><img class="card-img-top" src="" /></a>
            <div class="card-body">
                <div class="small text-muted">diposting {{ $articles[0]->created_at->format('d F Y') }} - Kategori <a href="/artikel?kategori={{ $articles[0]->category->slug }}">{{ $articles[0]->category->nama }}</a></div>
                <h2 class="card-title">{{ $articles[0]->judul }}</h2>
                <p class="card-text">{{ $articles[0]->kutipan }}</p>
                <a class="btn btn-primary" href="/artikel/">Read more →</a>
                <div class="mt-3">
                    @foreach ($articles[0]->tags as $tag)
                        <a href="/artikel?tag={{ $tag->slug }}" class="badge bg-secondary text-decoration-none link-light">{{ $tag->nama }}</a>
                    @endforeach
                </div>
            </div>
        </div> --}}
        <!-- Nested row for non-featured blog posts-->
        <div class="row">
            @foreach ($articles->skip(1) as $artikel)
                <div class="col-lg-6">
                    <!-- Blog post-->
                    <div class="card mb-4">
                        <a href="/artikel/{{ $artikel->slug }}"><img class="card-img-top" src="{{ asset('images/' . $artikel->gambar) }}" /></a>
                        <div class="card-body">
                            <div class="small text-muted">diposting {{ $artikel->created_at->format('d F Y') }} - Kategori <a href="/artikel?kategori={{ $artikel->category->slug }}">{{ $artikel->category->nama }}</a></div>
                            <h2 class="card-title h4">{{ $artikel->judul }}</h2>
                            <p class="card-text">{{ $artikel->kutipan }}</p>
                            <a class="btn btn-primary" href="/artikel/{{ $artikel->slug }}">Read more →</a>
                            <div class="mt-3">
                                @foreach ($artikel->tags as $tag)
                                    <a href="/artikel?tag={{ $tag->slug }}" class="badge bg-secondary text-decoration-none link-light">{{ $tag->nama }}</a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <!-- Pagination-->
        {{ $articles->links() }}
    </div>
@endsection
