@extends('layouts.app')

@section('content')
<div class="row justify-content-center my-5">
    <div class="col-lg-6">
        <div class="card shadow border-0 rounded-4 p-4">
            <h1 class="h3 fw-bold text-center text-primary mb-4">Detalle de la Programación</h1>
            <ul class="list-group list-group-flush mb-4">
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span class="fw-semibold text-secondary">Estación:</span>
                    <span>{{ $schedule->station->name ?? '-' }}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span class="fw-semibold text-secondary">Playlist:</span>
                    <span>{{ $schedule->playlist->name ?? '-' }}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span class="fw-semibold text-secondary">Día de la semana:</span>
                    <span>{{ $schedule->day_of_week }}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span class="fw-semibold text-secondary">Hora de inicio:</span>
                    <span>{{ $schedule->start_time }}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span class="fw-semibold text-secondary">Hora de fin:</span>
                    <span>{{ $schedule->end_time }}</span>
                </li>
            </ul>
            <div class="d-flex justify-content-between mt-4">
                <a href="{{ route('schedules.edit', $schedule) }}" class="btn btn-warning px-4"><i class="bi bi-pencil-square me-1"></i> Editar</a>
                <a href="{{ route('schedules.index') }}" class="btn btn-outline-primary px-4"><i class="bi bi-arrow-left me-1"></i> Volver</a>
            </div>
        </div>
    </div>
</div>
@endsection
