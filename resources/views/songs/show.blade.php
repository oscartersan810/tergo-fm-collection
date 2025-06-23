@extends('layouts.app')

@section('content')
<div class="row justify-content-center my-5">
    <div class="col-lg-7">
        <div class="card shadow border-0 rounded-4 p-4">
            <h1 class="h3 fw-bold text-center text-primary mb-4">Detalle de la Canción</h1>
            <ul class="list-group list-group-flush mb-4">
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span class="fw-semibold text-secondary">Nombre:</span>
                    <span class="fs-5">{{ $song->name }}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span class="fw-semibold text-secondary">Artista:</span>
                    <span>{{ $song->artist }}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span class="fw-semibold text-secondary">Archivo:</span>
                    <span>{{ $song->file ?? '-' }}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span class="fw-semibold text-secondary">Estación:</span>
                    <span>{{ $song->station->name ?? '-' }}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span class="fw-semibold text-secondary">Playlist:</span>
                    <span>{{ $song->playlist->name ?? '-' }}</span>
                </li>
            </ul>
            @if($song->file)
            <div class="mb-4">
                <label class="fw-semibold">Reproducir canción:</label>
                <audio controls class="w-100 mt-2">
                    <source src="{{ Str::startsWith($song->file, 'http') ? $song->file : asset('storage/' . $song->file) }}" type="audio/mpeg">
                    Tu navegador no soporta audio.
                </audio>
            </div>
            @endif
            @if($song->jingle)
            <div class="mb-4">
                <label class="fw-semibold">Jingle asociado:</label>
                <audio controls class="w-100 mt-2">
                    <source src="{{ asset('storage/' . $song->jingle) }}" type="audio/mpeg">
                    Tu navegador no soporta audio.
                </audio>
            </div>
            @endif
            <div class="d-flex justify-content-between mt-4">
                <a href="{{ route('songs.edit', $song) }}" class="btn btn-warning px-4"><i class="bi bi-pencil-square me-1"></i> Editar</a>
                <a href="{{ route('songs.index') }}" class="btn btn-outline-primary px-4"><i class="bi bi-arrow-left me-1"></i> Volver</a>
            </div>
        </div>
    </div>
</div>
@endsection
