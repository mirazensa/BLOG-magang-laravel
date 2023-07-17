@extends('layouts.main')

@section('container')
    <h1>ini halaman about</h1>
    <h2>{{ $name }}</h2>
    <h2>{{ $email }}</h2>
    <img src="/img/{{ $gambar }}" alt="ainul" width="200">
@endsection
