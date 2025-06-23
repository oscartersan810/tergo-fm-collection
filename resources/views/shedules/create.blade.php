@extends('layouts.app')

@section('content')
<div class="row justify-content-center my-5">
    <div class="col-lg-6">
        <div class="card shadow border-0 rounded-4 p-4">
            <h1 class="h3 fw-bold text-center text-primary mb-4">Crear Programación</h1>
            <form action="{{ route('schedules.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="station_id" class="form-label fw-semibold">Estación</label>
                    <select name="station_id" id="station_id" class="form-select form-select-lg" required>
                        <option value="">Selecciona una estación</option>
                        @foreach($stations as $station)
                            <option value="{{ $station->id }}">{{ $station->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="playlist_id" class="form-label fw-semibold">Playlist</label>
                    <select name="playlist_id" id="playlist_id" class="form-select form-select-lg" required>
                        <option value="">Selecciona una playlist</option>
                        @foreach($playlists as $playlist)
                            <option value="{{ $playlist->id }}">{{ $playlist->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="day_of_week" class="form-label fw-semibold">Día de la semana</label>
                    <select name="day_of_week" id="day_of_week" class="form-select form-select-lg" required>
                        <option value="Todos">Todos</option>
                        <option value="Lunes">Lunes</option>
                        <option value="Martes">Martes</option>
                        <option value="Miércoles">Miércoles</option>
                        <option value="Jueves">Jueves</option>
                        <option value="Viernes">Viernes</option>
                        <option value="Sábado">Sábado</option>
                        <option value="Domingo">Domingo</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="start_time" class="form-label fw-semibold">Hora de inicio</label>
                    <input type="time" name="start_time" id="start_time" class="form-control form-control-lg" required>
                </div>
                <div class="mb-4">
                    <label for="end_time" class="form-label fw-semibold">Hora de fin</label>
                    <input type="time" name="end_time" id="end_time" class="form-control form-control-lg" required>
                </div>
                <div class="d-flex justify-content-between mt-4">
                    <button class="btn btn-primary px-4" type="submit"><i class="bi bi-plus-circle me-1"></i> Crear</button>
                    <a href="{{ route('schedules.index') }}" class="btn btn-outline-primary px-4"><i class="bi bi-arrow-left me-1"></i> Volver</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
