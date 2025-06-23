@extends('layouts.app')

@section('content')
<div class="row justify-content-center my-5">
    <div class="col-lg-7">
        <div class="card shadow border-0 rounded-4 p-4">
            <h1 class="h3 fw-bold text-center text-primary mb-4">Detalle de la Estación</h1>
            <ul class="list-group list-group-flush mb-4">
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span class="fw-semibold text-secondary">Nombre:</span>
                    <span class="fs-5">{{ $station->name }}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span class="fw-semibold text-secondary">Tipo:</span>
                    <span class="text-capitalize">{{ $station->type == 'playlist' ? 'Playlist por horas' : 'Música continua' }}</span>
                </li>
                <li class="list-group-item">
                    <span class="fw-semibold text-secondary">Playlists:</span>
                    <ul class="mb-0 ps-4">
                        @forelse($station->playlists as $playlist)
                            <li>{{ $playlist->name }} <span class="text-muted small">({{ $playlist->time_slot ?? 'Sin franja' }})</span></li>
                        @empty
                            <li class="text-muted">Sin playlists</li>
                        @endforelse
                    </ul>
                </li>
                <li class="list-group-item">
                    <span class="fw-semibold text-secondary">Canciones:</span>
                    <ul class="mb-0 ps-4">
                        @forelse($station->songs as $song)
                            <li>{{ $song->name }} <span class="text-muted small">({{ $song->artist }})</span></li>
                        @empty
                            <li class="text-muted">Sin canciones</li>
                        @endforelse
                    </ul>
                </li>
            </ul>
            <div class="d-flex justify-content-between mt-4">
                <a href="{{ route('stations.edit', $station) }}" class="btn btn-warning px-4"><i class="bi bi-pencil-square me-1"></i> Editar</a>
                <a href="{{ route('stations.index') }}" class="btn btn-outline-primary px-4"><i class="bi bi-arrow-left me-1"></i> Volver</a>
            </div>
        </div>
        <div class="card shadow mt-5 p-4">
            <h4 class="mb-3">Historial de reproducción</h4>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Playlist</th>
                        <th>Canción</th>
                        <th>Fecha y hora</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($station->playbackHistories()->with(['playlist', 'song'])->orderByDesc('played_at')->limit(20)->get() as $history)
                    <tr>
                        <td>{{ $history->playlist->name ?? '-' }}</td>
                        <td>{{ $history->song->name ?? '-' }}</td>
                        <td>{{ $history->played_at }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection