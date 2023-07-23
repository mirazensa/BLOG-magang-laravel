@extends('layouts.main')

@section('container')
    <div class="container d-flex justify-content-center mt-5">
        @if (session()->has('ErrorLogin'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('ErrorLogin') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="card" style="width: 25rem">
            <div class="card-header p-0">
                <img src="{{ asset('assets/img/login.png') }}" class="img-thumbnail p-0" />
            </div>
            <div class="card-body">
                <p class="fw-bold fs-3">Sign In</p>
                <form action="/login" method="POST" class="form-group mx-4">
                    @csrf
                    <div class="mb-3">
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email Address" autofocus required>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <input type="password" name="password" class="form-control mb-3" placeholder="Password" required>
                    <button type="submit" class="btn btn-dark btn-block w-100">Sign In</button>
                </form>
            </div>
        </div>
    </div>
@endsection
