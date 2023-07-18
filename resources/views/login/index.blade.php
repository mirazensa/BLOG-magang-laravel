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
                <p class="font-weight-light fs-3">Sign In</p>
                <form class="form-group mx-4">
                    <input type="email" class="form-control mb-3" placeholder="Email Address">
                    <input type="password" class="form-control mb-3" placeholder="Password">
                    <button type="submit" class="btn btn-dark btn-block w-100">Sign In</button>
                </form>
                <p class="text-center mt-3">belum punya akun?<a href="/register" class="ps-2 text-decoration-none">Sign Up!</a></p>
            </div>
        </div>
    </div>
@endsection
