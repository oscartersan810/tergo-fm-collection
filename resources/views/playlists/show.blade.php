@extends('layouts.app')

@section('content')
<div class="row justify-content-center my-5">
    <div class="col-lg-7">
        <div class="card shadow border-0 rounded-4 p-4">
            <h1 class="h3 fw-bold text-center text-primary mb-4">Detalle de la Playlist</h1>
            <ul class="list-group list-group-flush mb-4">
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span class="fw-semibold text-secondary">Nombre:</span>
                    <span class="fs-5">{{ $playlist->name }}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span class="fw-semibold text-secondary">Descripción:</span>
                    <span>{{ $playlist->description ?? '-' }}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span class="fw-semibold text-secondary">Estación:</span>
                    <span>{{ $playlist->station->name ?? '-' }}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span class="fw-semibold text-secondary">Franja horaria:</span>
                    <span>{{ $playlist->time_slot ?? '-' }}</span>
                </li>
                <li class="list-group-item">
                    <span class="fw-semibold text-secondary">Canciones:</span>
                    <ul class="mb-0 ps-4">
                        @forelse($playlist->songs as $song)
                            <li>{{ $song->name }} <span class="text-muted small">({{ $song->artist }})</span></li>
                        @empty
                            <li class="text-muted">Sin canciones</li>
                        @endforelse
                    </ul>
                </li>
            </ul>
            <div class="d-flex justify-content-between mt-4">
                <a href="{{ route('playlists.edit', $playlist) }}" class="btn btn-warning px-4"><i class="bi bi-pencil-square me-1"></i> Editar</a>
                <a href="{{ route('playlists.index') }}" class="btn btn-outline-primary px-4"><i class="bi bi-arrow-left me-1"></i> Volver</a>
            </div>
        </div>
    </div>
</div>
@endsection
