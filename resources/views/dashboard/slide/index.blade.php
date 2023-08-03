@extends('dashboard.layout.main')

@section('content')
    <div class="container-fluid px-4">
        <div class="card mt-3">
            <div class="card-body px-4">
                <h1 class="mt-2 mb-4">Slide</h1>
                @if (Session::get('info'))
                    <div class="alert alert-info">{{ Session::get('info') }}</div>
                @endif
                <a href="/dashboard/slide/create" class="btn btn-outline-primary mb-2" title="tambah slide">Tambah Slide</a>
                <table class="table table-hover table-sm">
                    <thead>
                        <tr>
                            <th>no</th>
                            <th>gambar</th>
                            <th>Headline</th>
                            <th>aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php($no = 1)
                        @foreach ($slides as $slide)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td><img src="{{ asset('images/' . $slide->gambar) }}" width="50"></td>
                                <td>{{ $slide->judul }}</td>
                                <td>
                                    <a href="/dashboard/slide/{{ $slide->id }}/edit" class="btn btn-warning btn-sm" title="edit slide">edit</a>

                                    <form action="/dashboard/slide/{{ $slide->id }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" title="hapus slide">delete</button>
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
