@extends('layouts.main')

@section('container')
    <div class="mx-5 mt-4">
        <div class="row justify-content-around">
            <div class="col-8">
                <!-- content main  -->
                <div class="row mb-3">
                    <div class="col mb-3 bg-white rounded shadow-sm p-5">
                        <div class="row">
                            <div class="col">
                                <div class="d-flex justify-content-start">
                                    <nav aria-label="breadcrumb" class="fw-semibold">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="/blog" class="text-decoration-none">Home</a></li>
                                            <li class="breadcrumb-item"><a href="/blog?category={{ $post->category->slug }}" class="text-muted text-decoration-none">{{ $post->category->name }}</a></li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                            <div class="col">
                                <div class="d-flex justify-content-end">
                                    <a href="/blog" class="btn btn-sm btn-primary">Back To Home</a>
                                </div>
                            </div>
                            <h2 class="my-2 fw-bold">{{ $post->title }}</h2>
                            <p class="mb-5">
                                <a href="/blog?author={{ $post->author->username }}" class="text-muted text-decoration-none">by : {{ $post->author->name }} - {{ $post->created_at->diffForHumans() }}</a>
                            </p>
                            @if ($post->image)
                                <div class="img-container" style="height: 300px; overflow: hidden;">
                                    <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->category->name }}" class="object-fit-cover w-100 h-100 rounded border border-1 border-primary">
                                </div>
                            @else
                                <div class="img-container" style="height: 300px; overflow: hidden;">
                                    <img src="https://source.unsplash.com/random/1200x300?c" alt="{{ $post->category->name }}" class="object-fit-cover w-100 h-100 rounded border border-1 border-primary">
                                </div>
                            @endif
                            <article class="mt-5 fs-6">
                                {!! $post->body !!}
                            </article>
                        </div>
                        <!-- start content -->
                    </div>
                </div>

                <!-- end content main -->
            </div>

            <!-- about me -->
            <div class="col-md-3 mb-3">
                <div class="row mb-3">
                    <div class="col bg-white rounded py-3 px-4 shadow-sm">
                        <h1 class="text-center text-primary fw-bold fs-5 m-0">About Me</h1>
                        <hr class="border border-primary border-2 opacity-25" />
                        <div class="text-center">
                            <img src="https://c4.wallpaperflare.com/wallpaper/126/117/95/quote-motivational-digital-art-typography-wallpaper-preview.jpg" class="rounded-circle p-1 border border-primary border-3 border-opacity-50" width="100" height="100" />
                            <p class="fw-bold text-primary mt-3 mb-1">{{ $post->author->name }}</p>
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
    </div>
@endsection
