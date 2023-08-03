@extends('dashboard.layout.main')

@section('content')
    <div class="container-fluid px-4">
        <div class="card mt-3">
            <div class="card-body px-4">
                <div class="d-flex justify-content-between col-lg">
                    <h1 class="mt-2 mb-4">Slide Baru</h1>
                    <div class="mt3">
                        <a href="/dashboard/slide" class="btn btn-transparent text-primary mb-2"><i class="fas fa-arrow-left"></i> Kembali</a>
                    </div>
                </div>
                <div class="col-lg">
                    @if (Session::get('info'))
                        <div class="alert alert-info">{{ Session::get('info') }}</div>
                    @endif
                    <form action="/dashboard/slide" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="judul" class="form-label">Headline</label>
                            <input type="text" class="form-control @error('judul') is-invalid @enderror" name="judul" id="judul" value="{{ old('judul') }}">
                            @error('judul')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="gambar" class="form-label">Gambar</label>
                            <img class="tampil-gambar mb-3 img-fluid" width="300">
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
                            <textarea name="kutipan" id="editor" class="form-control">{{ old('kutipan') }}</textarea>
                        </div>
                        <button type="reset" class="btn btn-danger btn-sm">reset</button>
                        <button type="submit" class="btn btn-success btn-sm">Simpan</button>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection
