@extends('dashboard.layout.main')

@section('content')
    <div class="container-fluid px-4">
        <div class="card mt-3">
            <div class="card-body px-4">
                <div class="d-flex justify-content-between col-lg">
                    <h1 class="mt-2 mb-4">Slide Edit</h1>
                    <div class="mt3">
                        <a href="/dashboard/slide" class="btn btn-transparent text-primary mb-2"><i class="fas fa-arrow-left"></i> Kembali</a>
                    </div>
                </div>
                <div class="col-lg">
                    @if ($errors->any())
                        <div class="alert alert-danger">{{ 'Update Slide gagal' }}</div>
                    @endif
                    <form action="/dashboard/slide/{{ $data->id }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="judul" class="form-label">Headline</label>
                            <input type="text" class="form-control @error('judul') is-invalid @enderror" name="judul" id="judul" value="{{ old('judul', $data->judul) }}">
                            @error('judul')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="gambar" class="form-label">Gambar</label>
                            <input type="hidden" value="{{ $data->gambar }}" name="gambarLama">
                            @if ($data->gambar)
                                <img class="tampil-gambar mb-3 img-fluid d-block" width="300" src="{{ asset('images/' . $data->gambar) }}">
                            @else
                                <img class="tampil-gambar mb-3 img-fluid d-block" width="300">
                            @endif
                            <input type="file" class="form-control @error('gambar') is-invalid @enderror" name="gambar" id="gambar" onchange="tampilGambar()" value="{{ old('gambar') }}">
                            @error('gambar')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="kutipan" class="form-label">Kutipan</label>
                            @error('kutipan')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                            <textarea name="kutipan" id="editor" class="form-control">{{ old('kutipan', $data->kutipan) }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-success btn-sm">Update</button>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection
