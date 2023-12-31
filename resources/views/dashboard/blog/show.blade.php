@extends('dashboard.layouts.main')

@section('container')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Blog Dashboard
            </h1>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="container">
                <div class="row justify-content-center my-5">
                    <div class="col-lg-8">
                        <h1 class="mb-3">{{ $post->title }}</h1>
                        <a href="/dashboard/blog" class="btn btn-md btn-success margin-left-md"><i class="fas fa-arrow-left"></i> Kembali</a>
                        <a href="/dashboard/blog/{{ $post->slug }}/edit" class="btn btn-md btn-warning margin-left-md"><i class="fas fa-edit"></i> Edit</a>
                        <form action="/dashboard/blog/{{ $post->slug }}" method="post" class="d-inline">
                            @method('delete')
                            @csrf
                            <button class="btn btn-md btn-danger margin-left-md"><i class="fas fa-trash-alt"></i> Hapus</button>
                        </form>
                        @if ($post->image)
                            <div style="max-height: 300;overflow:hidden;">
                                <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->category->name }}" class="padding-x-md">
                            </div>
                        @else
                            <img src="https://source.unsplash.com/random/1200x300?{{ $post->category->name }}" alt="{{ $post->category->name }}" class="padding-x-md">
                        @endif
                        <article class="my-3 fs-5">
                            {!! $post->body !!}
                        </article>
                        <a href="/blog">back</a>
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
@endsection
