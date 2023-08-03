@extends('blog.layout.main')

@section('content')
    <div class="col-lg-8">
        @foreach ($users as $user)
            <header class="mb-4">
                <h1>{{ $user->name }}</h1>
            </header>
            <figure class="mb-4"><img src="{{ asset('images/' . $user->foto) }}" alt="" class="img-fluid"></figure>
            <section class="mb-4">{!! $user->words !!}</section>

            <h1 class="mt-5">Keahlian</h1>
            @foreach (explode(',', $user->keahlian) as $lang)
                <span>{{ $lang }}</span>
            @endforeach
        @endforeach
    </div>
@endsection
