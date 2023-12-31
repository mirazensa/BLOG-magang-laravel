@extends('dashboard.layouts.main')
@section('container')
    <div class="content-wrapper">
        <!-- Content Header -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Tambahkan Postingan Baru</h1>
                    </div>
                </div>
            </div>
        </div>
        <!-- end-content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="col-md-8">
                <form method="post" action="/dashboard/blog" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-2">
                        <div class="form-group">
                            <label for="title">Judul</label>
                            <input type="text" name="title" class="form-control  @error('title') is-invalid @enderror" id="title" required autofocus>
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>
                    <div class="mb-2">
                        <div class="form-group">
                            <label for="slug">Slug</label>
                            <input type="text" name="slug" class="form-control  @error('slug') is-invalid @enderror" id="slug">
                            @error('slug')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-2">
                        <div class="form-group">
                            <label for="category">Kategori</label>
                            <select class="custom-select" id="category_id" name="category_id">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <img class="img-preview img-fluid mb-3 col-sm-5">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Upload</span>
                        </div>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input @error('image') is-invalid @enderror" id="image" name="image" onchange="previewImage()">
                            <label class="custom-file-label" for="image">Choose file</label>
                        </div>
                        @error('image')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-2">
                        <div class="form-group">
                            <label for="body">Body</label>
                            @error('body')
                                <p class="text-danger">
                                    {{ $message }}
                                </p>
                            @enderror
                            <input id="body" type="hidden" name="body">
                            <trix-editor input="body"></trix-editor>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Tambahkan Postingan</button>
                </form>
            </div>

        </section>
    </div>
    <script>
        const title = document.querySelector('#title');
        const slug = document.querySelector('#slug');

        //change/keyup
        title.addEventListener('change', function() {
            fetch('/dashboard/blog/checkSlug?title=' + title.value)
                .then(response => response.json())
                .then(data => slug.value = data.slug)
        });

        document.addEventListener('trix-file-accept', function(e) {
            e.preventDefault();
        });

        function previewImage() {
            const image = document.querySelector('#image');
            const imgPreview = document.querySelector('.img-preview');

            imgPreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }
    </script>
@endsection
