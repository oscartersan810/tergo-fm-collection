@extends('layouts.app')

@section('content')
<div class="row justify-content-center my-5">
    <div class="col-lg-6">
        <div class="card shadow border-0 rounded-4 p-4">
            <h1 class="h3 fw-bold text-center text-primary mb-4">Crear Nueva Playlist</h1>
            <form action="{{ route('playlists.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label fw-semibold">Nombre</label>
                    <input type="text" name="name" id="name" class="form-control form-control-lg" required>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label fw-semibold">Descripción</label>
                    <textarea name="description" id="description" class="form-control form-control-lg" rows="3"></textarea>
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
                    <label for="time_slot" class="form-label fw-semibold">Franja horaria (opcional)</label>
                    <input type="text" name="time_slot" id="time_slot" class="form-control form-control-lg">
                </div>
                <div class="d-flex justify-content-between mt-4">
                    <button class="btn btn-primary px-4" type="submit"><i class="bi bi-plus-circle me-1"></i> Crear</button>
                    <a href="{{ route('playlists.index') }}" class="btn btn-outline-primary px-4"><i class="bi bi-arrow-left me-1"></i> Volver</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
