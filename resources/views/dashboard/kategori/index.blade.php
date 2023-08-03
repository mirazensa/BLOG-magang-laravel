@extends('dashboard.layout.main')

@section('content')
    <div class="container-fluid px-4">
        <div class="card mt-3">
            <div class="card-body px-4">
                <div class="d-flex justify-content-between col-lg">
                    <h1 class="mt-2 mb-4">Kategori</h1>
                </div>
                @if (Session::get('info'))
                    <div class="alert alert-info">{{ Session::get('info') }}</div>
                @endif
                <a href="/dashboard/kategori/create" class="btn btn-outline-primary mb3">Tambah Kategori</a>
                <table class="table table-hover table-sm">
                    <thead>
                        <tr>
                            <th>no</th>
                            <th>Nama kategori</th>
                            <th>deskripsi</th>
                            <th>aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php($no = 1)
                        @foreach ($categories as $kategori)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $kategori->nama }}</td>
                                <td>{{ $kategori->deskripsi }}</td>
                                <td>
                                    <a href="/dashboard/kategori/{{ $kategori->id }}/edit" class="btn btn-warning btn-sm" title="editkategori">edit</a>

                                    <form action="/dashboard/kategori/{{ $kategori->id }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" title="hapus kategori">delete</button>
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
