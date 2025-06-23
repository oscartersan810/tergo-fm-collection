@extends('layouts.app')

@section('content')
<div class="row justify-content-center my-5">
    <div class="col-lg-10">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="display-6 fw-bold text-primary mb-0">Canciones</h1>
            <a href="{{ route('songs.create') }}" class="btn btn-primary btn-lg shadow"><i class="bi bi-plus-circle me-1"></i> Nueva Canción</a>
        </div>
        <div class="card shadow border-0 rounded-4">
            <div class="table-responsive">
                <table class="table align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Artista</th>
                            <th>Estación</th>
                            <th>Playlist</th>
                            <th class="text-end">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($songs as $song)
                        <tr>
                            <td class="fw-semibold">{{ $song->id }}</td>
                            <td>{{ $song->name }}</td>
                            <td>{{ $song->artist }}</td>
                            <td>{{ $song->station->name ?? '-' }}</td>
                            <td>{{ $song->playlist->name ?? '-' }}</td>
                            <td class="text-end">
                                <a href="{{ route('songs.show', $song) }}" class="btn btn-outline-success btn-sm me-1"><i class="bi bi-eye"></i></a>
                                <a href="{{ route('songs.edit', $song) }}" class="btn btn-outline-warning btn-sm me-1"><i class="bi bi-pencil"></i></a>
                                <form action="{{ route('songs.destroy', $song) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Seguro que deseas eliminar esta canción?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger btn-sm"><i class="bi bi-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
