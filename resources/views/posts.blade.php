@extends('layouts.main')

@section('container')
    <div class="mx-5 mt-3">
        <h1 class="my-3">{{ $title }}</h1>
        @if ($posts->count())
            <div class="row justify-content-around">
                <div class="col-md-8 mb-3">
                    <!-- content main  -->
                    @foreach ($posts as $post)
                        <div class="row mb-3 bg-white rounded shadow-sm py-3 px-1">
                            <div class="col-md-4">
                                <div class="position-absolute bg-dark px-3 py-1 rounded bg-opacity-75"><a href="/blog?category={{ $post->category->slug }}" class="text-decoration-none text-white">{{ $post->category->name }}</a></div>
                                @if ($post->image)
                                    <img src="{{ asset('storage/' . $post->image) }}" class="img-thumbnail p-0" alt="{{ $post->category->name }}" />
                                @else
                                    <img src="https://source.unsplash.com/random/1280x960?{{ $post->category->name }}" class="img-thumbnail p-0" alt="{{ $post->category->name }}" />
                                @endif
                            </div>
                            <div class="col-md-8 d-block">
                                <div class="d-flex flex-column justify-content-between h-100">
                                    <div>
                                        <h4 class="fw-bold m-0"><a class="text-decoration-none text-black" href="/blog/{{ $post->slug }}">{{ $post->title }}</a></h4>
                                        <p class="fs-6 m-0 text-muted">By : <a href="/blog?author={{ $post->author->username }}" class="text-decoration-none text-muted">{{ $post->author->name }}</a> - {{ $post->created_at->diffForHumans() }}</p>
                                        <p class="fs-6 m-0 p-0">{{ $post->excerpt }}</p>
                                    </div>
                                    <div class="mt-auto ms-auto">
                                        <a href="/blog/{{ $post->slug }}" class="btn btn-sm btn-primary">Read More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <!-- end content main -->
                </div>
            @else
                <div class="row justify-content-around">
                    <div class="col-md-8 mb-3">
                        <div class="row mb-3 py-3 px-1">
                            <div class="col">
                                <p class="text-center fs-4">No Post Found.</p>
                            </div>
                        </div>
                    </div>
        @endif

        <!-- about me -->
        <div class="col-md-3 mb-3">
            <div class="row mb-3">
                <div class="col bg-white rounded py-3 px-4 shadow-sm">
                    <h1 class="text-center text-primary fw-bold fs-5 m-0">About Me</h1>
                    <hr class="border border-primary border-2 opacity-25" />
                    <div class="text-center">
                        <img src="https://c4.wallpaperflare.com/wallpaper/126/117/95/quote-motivational-digital-art-typography-wallpaper-preview.jpg" class="rounded-circle p-1 border border-primary border-3 border-opacity-50" width="100" height="100" />
                        <p class="fw-bold text-primary mt-3 mb-1">MOCH.AINUL KURNIAWAN</p>
                        <p class="fw-semibold text-muted">Sidoarjo, Jawa Timur, Indonesia</p>
                        <a href="/portfolio" class="btn btn-primary text-white mb-3">Lihat Profil Lebih Lengkap</a>
                    </div>
                </div>
            </div>
            <!-- end about me -->
            <!-- category -->
            <div class="row mb-3">
                <div class="col bg-white rounded py-3 px-4 shadow-sm">
                    <h1 class="text-center text-primary fw-bold fs-5 m-0">Kategori</h1>
                    <hr class="border border-primary border-2 opacity-25" />
                    <div class="text-center">
                        @foreach ($categories as $category)
                            <a href="/blog?category={{ $category->slug }}" type="button" class="btn btn-primary btn-sm text-white mb-1">{{ $category->name }}</a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <!-- end category -->
    </div>
    <div class="d-flex justify-content-end mb-5">
        {{ $posts->links() }}
    </div>
    </div>

@endsection
