@extends('dashboard.layout.main')

@section('content')
    <div class="container-fluid px-4">
        <div class="card mt-3">
            <div class="card-body px-4">
                <div class="d-flex justify-content-between col-lg">
                    <h1 class="mt-2 mb-4">Artikel Update</h1>
                    <div class="mt3">
                        <a href="/dashboard/artikel" class="btn btn-transparent text-primary mb-2"><i class="fas fa-arrow-left"></i> Kembali</a>
                    </div>
                </div>
                <div class="col-lg">
                    @if (Session::get('info'))
                        <div class="alert alert-info">{{ Session::get('info') }}</div>
                    @elseif($errors->any())
                        <div class="alert alert-danger">{{ 'Edit artikel gagal' }}</div>
                    @endif
                    <form action="/dashboard/artikel/{{ $data->id }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="judul" class="form-label">Judul artikel</label>
                            <input type="text" class="form-control @error('judul') is-invalid @enderror" name="judul" id="judul" value="{{ old('judul', $data->judul) }}" onkeyup="getSlug()">
                            @error('judul')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="slug" class="form-label">Slug</label>
                            <input type="text" class="form-control @error('slug') is-invalid @enderror" name="slug" id="slug" value="{{ old('slug', $data->slug) }}">
                            @error('slug')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="category_id" class="form-label">Kategori artikel</label>
                            <select name="category_id" id="" class="form-select @error('category_id') is-invalid @enderror">
                                <option value="">Pilih Kategori</option>
                                @foreach ($categories as $kategori)
                                    @if (old('category_id', $data->category_id) == $kategori->id)
                                        <option value="{{ $kategori->id }}" selected>{{ $kategori->nama }}</option>
                                    @else
                                        <option value="{{ $kategori->id }}">{{ $kategori->nama }}</option>
                                    @endif
                                @endforeach
                            </select>
                            @error('category_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="gambar" class="form-label">Gambar</label>
                            <input type="hidden" name="gambarLama" value="{{ $data->gambar }}">

                            @if ($data->gambar)
                                <img src="{{ asset('images/' . $data->gambar) }}" width="300" class="img-fluid tampil-gambar mb-3">
                            @else
                                <img class="tampil-gambar mb-3 img-fluid" width="300">
                            @endif

                            <input type="file" class="form-control @error('gambar') is-invalid @enderror" name="gambar" id="gambar" onchange="tampilGambar()" value="{{ old('gambar') }}">
                            @error('gambar')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="tag" class="form-label">Tag (Pisahkan dengan koma)</label>
                            <input type="text" class="form-control @error('tag') is-invalid @enderror" name="tag" value="{{ old('tag', $tags) }}">
                            @error('tag')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="isi" class="form-label">isi artikel</label>
                            @error('isi')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                            <textarea name="isi" class="form-control" id="editor">{{ old('isi', $data->isi) }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-success btn-sm">Update</button>
                    </form>
                </div>
            </div>
        </div>

    </div>
    <script>
        function getSlug() {
            $.get('{{ url('/slug-artikel') }}', {
                    'judul': $('#judul').val()
                },
                function(data) {
                    $('#slug').val(data.slug)
                }
            )
        }
    </script>
@endsection
