@extends('layouts.app')

@section('content')
<div class="row justify-content-center my-5">
    <div class="col-lg-10">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="display-6 fw-bold text-primary mb-0">Playlists</h1>
            <a href="{{ route('playlists.create') }}" class="btn btn-primary btn-lg shadow"><i class="bi bi-plus-circle me-1"></i> Nueva Playlist</a>
        </div>
        <div class="card shadow border-0 rounded-4">
            <div class="table-responsive">
                <table class="table align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Descripción</th>
                            <th>Estación</th>
                            <th>Franja</th>
                            <th>Canciones</th>
                            <th class="text-end">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($playlists as $playlist)
                        <tr>
                            <td class="fw-semibold">{{ $playlist->id }}</td>
                            <td>{{ $playlist->name }}</td>
                            <td class="text-truncate" style="max-width: 200px;">{{ $playlist->description ? Str::limit($playlist->description, 60) : '-' }}</td>
                            <td>{{ $playlist->station->name ?? '-' }}</td>
                            <td>{{ $playlist->time_slot ?? '-' }}</td>
                            <td><span class="badge bg-primary bg-opacity-10 text-primary">{{ $playlist->songs->count() }}</span></td>
                            <td class="text-end">
                                <a href="{{ route('playlists.show', $playlist) }}" class="btn btn-outline-success btn-sm me-1"><i class="bi bi-eye"></i></a>
                                <a href="{{ route('playlists.edit', $playlist) }}" class="btn btn-outline-warning btn-sm me-1"><i class="bi bi-pencil"></i></a>
                                <form action="{{ route('playlists.destroy', $playlist) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Seguro que deseas eliminar esta playlist?');">
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
