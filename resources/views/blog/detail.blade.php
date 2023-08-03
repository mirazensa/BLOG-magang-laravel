@extends('blog.layout.main')

@section('content')
    <div class="col-lg-8">
        <header class="mb-4">
            <h1 class="fw-bolder mb-1">{{ $article->judul }}</h1>
            <div class="text-muted fst-italic mb-2">
                diposting :{{ $article->created_at->format('d F Y') }} - oleh {{ $article->user->name }} - Kategori <a href="/artikel?kategori={{ $article->category->slug }}">{{ $article->category->nama }}</a>
            </div>
            @foreach ($article->tags as $tag)
                <a href="/artikel?tag={{ $tag->slug }}" class="badge bg-secondary text-decoration-none link-light">{{ $tag->nama }}</a>
            @endforeach
        </header>
        <figure class="mb-4"><img src="{{ asset('images/' . $article->gambar) }}" alt="" class="img-fluid"></figure>
        <section class="mb-4">{!! $article->isi !!}</section>
    </div>
@endsection
