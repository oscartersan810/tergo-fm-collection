@extends('layouts.app')

@section('content')
<div class="row justify-content-center my-5">
    <div class="col-lg-6">
        <div class="card shadow border-0 rounded-4 p-4">
            <h1 class="h3 fw-bold text-center text-primary mb-4">Crear Nueva Canción</h1>
            <form action="{{ route('songs.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label fw-semibold">Nombre</label>
                    <input type="text" name="name" id="name" class="form-control form-control-lg" required>
                </div>
                <div class="mb-3">
                    <label for="artist" class="form-label fw-semibold">Artista</label>
                    <input type="text" name="artist" id="artist" class="form-control form-control-lg" required>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Archivo MP3</label>
                    <input type="file" name="file_upload" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">o URL de la canción</label>
                    <input type="url" name="file_url" class="form-control" placeholder="https://...">
                </div>
                <div class="mb-3">
                    <label for="station_id" class="form-label fw-semibold">Estación</label>
                    <select name="station_id" id="station_id" class="form-select form-select-lg">
                        <option value="">Sin estación</option>
                        @foreach($stations as $station)
                            <option value="{{ $station->id }}">{{ $station->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-4">
                    <label for="playlist_id" class="form-label fw-semibold">Playlist</label>
                    <select name="playlist_id" id="playlist_id" class="form-select form-select-lg">
                        <option value="">Sin playlist</option>
                        @foreach($playlists as $playlist)
                            <option value="{{ $playlist->id }}">{{ $playlist->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="d-flex justify-content-between mt-4">
                    <button class="btn btn-primary px-4" type="submit"><i class="bi bi-plus-circle me-1"></i> Crear</button>
                    <a href="{{ route('songs.index') }}" class="btn btn-outline-primary px-4"><i class="bi bi-arrow-left me-1"></i> Volver</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
