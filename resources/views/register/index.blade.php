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
                    <input type="text" class="form-control mb-3" placeholder="Name" name="name">
                    <input type="text" class="form-control mb-3" placeholder="Username" name="username">
                    <input type="email" class="form-control mb-3" placeholder="Email Address" name="email">
                    <input type="password" class="form-control mb-3" placeholder="Password" name="password">
                    <button type="submit" class="btn btn-dark btn-block w-100">Sign Up</button>
                </form>
                <p class="text-center mt-3">sudah punya akun?<a href="/login" class="ps-2 text-decoration-none">Sign In!</a></p>
            </div>
        </div>
    </div>
@endsection
