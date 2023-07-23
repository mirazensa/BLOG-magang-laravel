@extends('layouts.main')

@section('container')
    @if (session()->has('sukses'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('sukses') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if (session()->has('ErrorLogin'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('ErrorLogin') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="container d-flex justify-content-center mt-3">
        <div class="card" style="width: 25rem;">
            <div class="card-header p-0">
                <img src="/img/login2.png" class="img-fluid">
            </div>
            <div class="card-body">
                <p class="font-weight-light fs-3">Sign In</p>
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
                <p class="text-center mt-3">belum punya akun?<a href="/register" class="ps-2 text-decoration-none">Sign Up!</a></p>
            </div>
        </div>
    </div>
@endsection
