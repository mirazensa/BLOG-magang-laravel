@extends('blog.layout.main')

@section('content')
    @if (session()->has('Gagal'))
        <div class="alert alert-danger text-start mt-3">{{ session('Gagal') }}</div>
    @endif
    <div class="container d-flex justify-content-center mt-5">
        <div class="card" style="width: 25rem">
            <div class="card-header p-0">
                <img src="{{ asset('assets/img/login.png') }}" class="img-thumbnail p-0" />
            </div>
            <div class="card-body">
                <p class="fw-bold fs-3">daftar In</p>
                <form action="/register" method="POST" class="form-group mx-4">
                    @csrf
                    <div class="mb-3">
                        <input type="name" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="name anda" autofocus value="{{ old('name') }}">
                        @error('name')
                            <div class="invalid-feedback">{{ $message }} </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email Address" autofocus value="{{ old('email') }}">
                        @error('email')
                            <div class="invalid-feedback">{{ $message }} </div>
                        @enderror
                    </div>
                    <input type="password" name="password" class="form-control mb-3 @error('password') is-invalid @enderror" placeholder="Password">
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <button type="submit" class="btn btn-dark btn-block w-100">daftar In</button>
                </form>
            </div>

        </div>
    </div>
@endsection
