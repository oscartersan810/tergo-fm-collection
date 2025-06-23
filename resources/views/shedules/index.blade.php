@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="display-6 fw-bold text-primary mb-0">Programación horaria</h1>
    <a href="{{ route('schedules.create') }}" class="btn btn-primary btn-lg shadow"><i class="bi bi-plus-circle me-1"></i> Nueva programación</a>
</div>
<div class="card shadow border-0 rounded-4">
    <div class="table-responsive">
        <table class="table align-middle mb-0">
            <thead class="table-light">
                <tr>
                    <th>Estación</th>
                    <th>Playlist</th>
                    <th>Día</th>
                    <th>Inicio</th>
                    <th>Fin</th>
                    <th class="text-end">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($schedules as $schedule)
                <tr>
                    <td>{{ $schedule->station->name ?? '-' }}</td>
                    <td>{{ $schedule->playlist->name ?? '-' }}</td>
                    <td>{{ $schedule->day_of_week }}</td>
                    <td>{{ $schedule->start_time }}</td>
                    <td>{{ $schedule->end_time }}</td>
                    <td class="text-end">
                        <a href="{{ route('schedules.show', $schedule) }}" class="btn btn-outline-success btn-sm me-1"><i class="bi bi-eye"></i></a>
                        <a href="{{ route('schedules.edit', $schedule) }}" class="btn btn-outline-warning btn-sm me-1"><i class="bi bi-pencil"></i></a>
                        <form action="{{ route('schedules.destroy', $schedule) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Seguro que deseas eliminar esta programación?');">
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
@endsection
