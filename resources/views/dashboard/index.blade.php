@extends('dashboard.layout.main')

@section('content')
    <div class="container-fluid px-4">
        <div class="card mt-3">
            <div class="card-body px-4">
                <div class="d-flex justify-content-between col-lg">
                    <h1 class="mt-2 mb-4">Profile</h1>
                </div>
                <div class="col-lg">
                    @if (Session::get('info'))
                        <div class="alert alert-info">{{ Session::get('info') }}</div>
                    @endif
                    <form action="/dashboard" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-lg-5">
                                <div class="mb-3 pe-5">
                                    <label for="foto" class="form-label">Foto</label>
                                    <input type="hidden" name="fotoLama" value="{{ auth()->user()->foto }}">

                                    @if (auth()->user()->foto)
                                        <img src="{{ asset('images/' . auth()->user()->foto) }}" class="img-fluid tampil-gambar mb-3 col-sm-5 d-block">
                                    @else
                                        <img class="tampil-gambar mb-3 img-fluid col-sm-5 d-block">
                                    @endif

                                    <input type="file" class="form-control @error('foto') is-invalid @enderror" name="foto" id="gambar" onchange="tampilGambar()">
                                    @error('foto')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-7 border-start p-5">
                                <div class="mb-3">
                                    <label for="name" class="form-label">name</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{ old('name', auth()->user()->name) }}">
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">email</label>
                                    <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{ old('email', auth()->user()->email) }}">
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="telepon" class="form-label">telepon</label>
                                    <input type="text" class="form-control @error('telepon') is-invalid @enderror" name="telepon" id="telepon" value="{{ old('telepon', auth()->user()->telepon) }}">
                                    @error('telepon')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="alamat" class="form-label">alamat</label>
                                    <textarea class="form-control @error('alamat') is-invalid @enderror" name="alamat" id="alamat">
                                        {{ old('alamat', auth()->user()->alamat) }}
                                    </textarea>
                                    @error('alamat')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="keahlian" class="form-label">keahlian (pisahkan dengan koma)</label>
                                    <input type="text" class="form-control @error('keahlian') is-invalid @enderror" name="keahlian" id="keahlian" value="{{ old('keahlian', auth()->user()->keahlian) }}">
                                    @error('keahlian')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="words" class="form-label">words</label>
                                    <textarea class="form-control @error('words') is-invalid @enderror" name="words" id="editor">
                                        {{ old('words', auth()->user()->words) }}
                                    </textarea>
                                    @error('words')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-outline-primary">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection
