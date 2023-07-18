<!doctype html>
<html lang="en">

@extends('layouts.main')

@section('container')
    <div class="container d-flex justify-content-center mt-3">
        <div class="card" style="width: 25rem;">
            <div class="card-header p-0">
                <img src="/img/login2.png" class="img-fluid">
            </div>
            <div class="card-body">
                <p class="font-weight-light fs-3">Sign Up</p>
                <form class="form-group mx-4" action="/register" method="post">
                    @csrf
                    <div class="mb-3">
                        <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Name" name="name" required>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <input type="text" class="form-control @error('username') is-invalid @enderror" placeholder="Username" name="username" required>
                        @error('username')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email Address" name="email" required>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" name="password" required>
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <button type="submit" class="btn btn-dark btn-block w-100">Sign Up</button>
                    </div>

                </form>
                <p class="text-center mt-3">sudah punya akun?<a href="/login" class="ps-2 text-decoration-none">Sign In!</a></p>
            </div>
        </div>
    </div>
@endsection
