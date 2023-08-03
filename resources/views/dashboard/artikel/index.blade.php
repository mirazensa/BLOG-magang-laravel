@extends('dashboard.layout.main')

@section('content')
    <div class="container-fluid px-4">
        <div class="card mt-3">
            <div class="card-body px-4">
                <div class="d-flex justify-content-between col-lg">
                    <h1 class="mt-2 mb-4">Artikel</h1>
                </div>
                @if (Session::get('info'))
                    <div class="alert alert-info">{{ Session::get('info') }}</div>
                @endif
                <a href="/dashboard/artikel/create" class="btn btn-outline-primary mb3">Tambah artikel</a>
                <table class="table table-hover table-sm">
                    <thead>
                        <tr>
                            <th>no</th>
                            <th>Judul artikel</th>
                            <th>kategori</th>
                            <th>tag</th>
                            <th>aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php($no = 1)
                        @foreach ($articles as $artikel)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $artikel->judul }}</td>
                                <td>{{ $artikel->category->nama }}</td>
                                <td>
                                    @foreach ($artikel->tags as $tag)
                                        {{ $tag->nama }}
                                    @endforeach
                                </td>
                                <td>
                                    <a href="/dashboard/artikel/{{ $artikel->id }}/edit" class="btn btn-warning btn-sm" title="edit artikel">edit</a>

                                    <form action="/dashboard/artikel/{{ $artikel->id }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" title="hapus artikel">delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>

    </div>
@endsection
